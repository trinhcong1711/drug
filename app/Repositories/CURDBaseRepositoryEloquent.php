<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

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
        return $this->filtersField($filters, $request, !is_null($column) ? $column : 'id', !is_null($sort) ? $sort : 'desc', !is_null($paginate) ? $paginate : 10);
    }

    /**
     * filter
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
