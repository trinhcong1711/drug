<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UnitRepository.
 *
 * @package namespace App\Repositories\Units;
 */
interface CURDBaseRepository extends RepositoryInterface
{
    //List function of core
    /**
     * Hàm trả về
     * @param $query
     * @param $filters mảng 2 chiều
     * VD : $filters = [
     *                      'name' => [
     *                              'type' => 'text',
     *                              'query' => 'like'
     *                            ],
     *                          'note' => [
     *                          'type' => 'text',
     *                          'query' => 'like'
     *                      ],
     *
     *                  ];
     * @param $request
     * @return string
     */
    public function filtersField($filters, $request, $column, $sort, $paginate);
    public function filterCustom($query);
}
