<?php

namespace Modules\DrugUnit\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class UnitController extends Controller
{
    protected $title = 'Vị trí';
    protected $url = 'unit';//Giống với route
    protected $model = 'Modules\DrugUnit\Entities\Unit';

    /**
     * Hiển thị danh sách bản ghi phù hợp
     * @return Response
     */
    public function getList()
    {
        $data['items'] = $this->model::paginate(10);
        return view('drugunit::unit.list',$data);
    }

    /**
     * Giao diện thêm mới
     * @return Response
     */
    public function getAdd()
    {
        return view('drugunit::unit.add');
    }

    /**
     * Thêm mới 1 bản ghi
     * @param Request $request
     * @return Response
     */
    public function postAdd(Request $request)
    {
        //
    }


    /**
     * Hiển thị giao diện vủa 1 bản ghi muốn sửa
     * @param int $id
     * @return Response
     */
    public function getEdit($id)
    {
        return view('drugunit::unit.edit');
    }

    /**
     * Sửa một bản ghi
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function postEdit(Request $request, $id)
    {
        //
    }

    /**
     * xóa 1 bản ghi
     * @param int $id
     */
    public function getDelete($id)
    {
        //
    }
    /**
     *Xóa nhiều bản ghi
     * @param text $id=1,2,3,4,5,...
     * @return Response
     */
    public function getMultiDelete($id)
    {
        //
    }
}
