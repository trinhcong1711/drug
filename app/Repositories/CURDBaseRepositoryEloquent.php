<?php

namespace App\Repositories;

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
    public function getIndex($filters, $request)
    {
        return $this->filtersField($filters, $request);
    }

    public function filtersField($filters, $request)
    {
        $query = $this->makeModel()->where(function ($query) use ($filters, $request) {
            foreach ($filters as $name => $filter) {
                if ($request[$name]) {
                    if ($filter['query'] == 'like') {
                        $query->where($name, 'like', '%' . $request[$name] . '%');
                    } elseif ($filter['query'] == 'custom') {
                        $this->filterCustom($query);
                    } else {
                        $query->where($name,$filter['query'], $request[$name]);
                    }
                }

            }
        });
        return $query;
    }

    /**
     * custom filter with condition your
     *
     * @param $query is object
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
