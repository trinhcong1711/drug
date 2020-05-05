<?php

namespace App\Repositories;

use App\Exports\DefaultExport;
use Maatwebsite\Excel\Facades\Excel;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class UnitRepositoryEloquent.
 *
 * @package namespace App\Repositories\Units;
 */
class CURDBaseRepositoryEloquent extends BaseRepository implements CURDBaseRepository
{
    /**
     * @param $filters : array dạng mảng 2 chiều chứa các thuộc tính của ô input muốn tìm kiếm.
     * @param $request
     * @param $column = Null : string tên cột muốn sắp xếp
     * @param $sort = Null :string dạng sắp xếp; 'desc' hay 'asc',...
     * @param $paginate = Null : int số bản ghi trong 1 page
     * @return object
     */
    public function getIndex($filters, $request, $column = Null, $sort = Null, $paginate = Null)
    {
        return $this->filtersField($filters, $request, !is_null($column) ? $column : 'id', !is_null($sort) ? $sort : 'desc', !is_null($paginate) ? $paginate : 15);
    }

    /**
     * @param $filters : array dạng mảng 2 chiều chứa các thuộc tính của ô input muốn tìm kiếm.
     * @param $request
     * @param $column = Null : string tên cột muốn sắp xếp
     * @param $sort = Null :string dạng sắp xếp; 'desc' hay 'asc',...
     * @param $paginate = Null : int số bản ghi trong 1 page
     * @return object
     */
    public function filtersField($filters, $request, $column, $sort, $paginate)
    {
        $query = $this->makeModel()->where(function ($query) use ($filters, $request) {
            foreach ($filters as $name => $filter) {
                if ($request[$name]) {
                    if ($filter['query'] == 'like') {
                        $query->where($name, 'like', '%' . $request[$name] . '%');
                    } elseif ($filter['query'] == 'custom') {
                        $this->filterCustom($query);
                    } else {
                        $query->where($name, $filter['query'], $request[$name]);
                    }
                }
            }
        })->orderBy($column, $sort)->paginate($paginate);
        return $query;
    }

    /**
     * custom filter with condition your
     *
     * @param $query object
     * @return bool
     */
    public function filterCustom($query)
    {
        return true;
    }

    /**
     * @param $request
     * @param $inputName string(name of input)
     * @param $importFacade  string VD: UnitImport::class
     * @return true
     **/
    public function getImportXLSX($request,$inputName='importFile', $importFacade){
            if ($request->hasFile($inputName)){
                if($request[$inputName]->getClientOriginalExtension() == 'xlsx'){
                    Excel::import(new $importFacade, request()->file('importFile'), 's3', \Maatwebsite\Excel\Excel::XLSX);
                    return back()->with('success', 'Thêm dữ liệu thành công!');
                }else{
                    return back()->with('error', 'Thất bại! Sai định dạng file! Vui lòng chọn file có đuôi là .XLSX!');
                }
            }else{
                return back()->with('error', 'Thất bại! Chưa chọn file!');
            }
    }
    /**
     * @param $columns array['col1','col2',...] or [['name'=>'col1]['name'=>'col2],...]
     * @param $fileName string(name of file)
     * @param $makeModel string VD: Unit::class
     * @param $exportFacade string VD: UnitExport::class
     * @return Excel::class
     **/
    public function getExportXLSX($columns, $fileName, $makeModel,$exportFacade)
    {
        $rows = $makeModel->select(array_unique($this->getFirstColumn($columns)))->get()->toArray();
        $defaultExport = new $exportFacade([
            array_unique($this->getFirstColumn($columns)),
            $rows
        ]);
        return Excel::download($defaultExport, $fileName . '.xlsx');
    }
/**
* @param $columns array['col1','col2',...] or [['name'=>'col1]['name'=>'col2],...]
* @return array
**/
    public function getFirstColumn($columns)
    {
        $cols = [];
        if (!isset($columns[0]['name'])) {
            $cols[] = $columns;
        }else{
            foreach ($columns as $value) {
                $cols[] = $value['name'];
            }
        }
        return $cols;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return true;
    }
}
