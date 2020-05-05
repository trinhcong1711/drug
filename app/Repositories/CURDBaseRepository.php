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
    public function filtersField($filters, $request, $column, $sort, $paginate);
    public function getIndex($filters, $request, $column = Null, $sort = Null, $paginate = Null);
    public function getExportXLSX($columns,$fileName,$makeModel,$exportFacade);
    public function getImportXLSX($request,$inputName, $importFacade);
}
