<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\Units\UnitCreateRequest;
use App\Http\Requests\Units\UnitUpdateRequest;
use App\Repositories\Units\UnitRepositoryEloquent;

/**
 * Class UnitsController.
 *
 * @package namespace App\Http\Controllers\Units;
 */
class UnitsController extends Controller
{
    /*
     *
     */
    protected $slug = 'unit';
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $units = $this->repository->orderBy('id', 'desc')->paginate(15);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $units,
            ]);
        }

        return view('backend.partial.units.list', compact('units'));
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
            return redirect('/admin/' . $this->slug)->with('success', $response['success']);
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
                'message' => 'Cập nhật vị trí thành công!',
                'data' => $unit->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            if ($request->return_redirect == 'save_continue') {
                return back()->with('success', $response['success']);
            }
            return redirect()->back()->with('message', $response['message']);
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
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Xóa thành công.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Unit deleted.');
    }
}
