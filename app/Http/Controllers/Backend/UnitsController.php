<?php

namespace App\Http\Controllers\Backend;

use App\Exports\DefaultExport;
use App\Exports\UnitsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\Units\UnitCreateRequest;
use App\Http\Requests\Units\UnitUpdateRequest;
use App\Repositories\Units\UnitRepositoryEloquent;
use App\Imports\UnitsImport;

/**
 * Class UnitsController.
 *
 * @package namespace App\Http\Controllers\Units;
 */
class UnitsController extends Controller
{

    /**
     * @var UnitRepositoryEloquent
     */
    protected $repository;

    /**
     * UnitsController constructor.
     *
     * @param UnitRepositoryEloquent $repository
     */
    public function __construct(UnitRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
/*
 * Lấy dữ liệu cần thiết
 * */
        $data['filters'] = $this->repository->getFilters();
        $data['modules'] = $this->repository->getModules();
        $data['listColumns'] = $this->repository->getListColumns();

        if($request->has('row_numbers')){
//            Tùy chọn số bản ghi hiển thị
            $data['listItems'] = $this->repository->getIndex($this->repository->getFilters(), $request, 'id', 'desc', $request->row_numbers);
        }else{
            $data['listItems'] = $this->repository->getIndex($this->repository->getFilters(), $request, 'id', 'desc', 15);
        }

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $data['units'],
            ]);
        }

        return view('backend.partial.units.list', $data);
    }

    public function create()
    {
        return view('backend.partial.units.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UnitCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function store(UnitCreateRequest $request)
    {
        try {
            $unit = $this->repository->create($request->except('return_redirect'));

            $response = [
                'success' => 'Tạo mới thành công',
                'data' => $unit->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }
            if ($request->return_redirect == 'save_new') {
                return back()->with('success', $response['success']);
            }
            return redirect('/admin/' . $this->repository->getModules()['slug'])->with('success', $response['success']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = $this->repository->find($id);

        return view('backend.partial.units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UnitUpdateRequest $request
     * @param string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UnitUpdateRequest $request, $id)
    {
        try {

            $unit = $this->repository->update($request->except('return_redirect'), $id);
            $response = [
                'success' => 'Cập nhật vị trí thành công!',
                'data' => $unit->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }
            if ($request->return_redirect == 'save_back') {
                return redirect('/admin/' . $this->repository->getModules()['slug'])->with('success', $response['success']);
            }
            return back()->with('success', $response['success']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->back()->with('success', 'Xóa thành công!');
    }

    /**
     * Remove multiple the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {
        $ids = $request->ids;
        $destroyed = $this->repository->model()::destroy($ids);
        if (request()->wantsJson()) {

            return response()->json([
                'success' => 'Xóa thành công!',
                'deleted' => $destroyed,
            ]);
        }
        return redirect()->back()->with('success', 'Xóa thành công!');
    }

    public function getExport()
    {
        try {
            return  Excel::download(new UnitsExport($this->repository->getExcels()[0],$this->repository->getExcels()[1]), $this->repository->getModules()['slug'].'.xlsx');
        } catch (Exception $e) {
            return back()->with('error', 'Thất bại! Có lỗi xảy ra!');
        }
    }
    public function getExportDefault()
    {
        return  Excel::download(new DefaultExport($this->repository->getExcels()), $this->repository->getModules()['slug'].'.xlsx');
    }

    public function postImport()
    {
        try {
        Excel::import(new UnitsImport($this->repository->getExcels()[0],$this->repository->getExcels()[1]), request()->file('importFile'), 's3',\Maatwebsite\Excel\Excel::XLSX);
        return redirect()->back()->with('success','Thêm nhanh thành công!');
        } catch (Exception $e) {
            return back()->with('error', 'Thất bại! Có lỗi xảy ra! Liên hệ tới kỹ thuật viên!');
        }

    }
}
