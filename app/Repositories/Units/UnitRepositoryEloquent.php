<?php

namespace App\Repositories\Units;

use App\Repositories\CURDBaseRepositoryEloquent;
use App\Models\Unit;

/**
 * Class UnitRepositoryEloquent.
 *
 * @package namespace App\Repositories\Units;
 */
class UnitRepositoryEloquent extends CURDBaseRepositoryEloquent implements UnitRepository
{
    protected $modules = [
        'slug' => 'unit'
    ];
    protected $filters = [
        'name' => [
            'label' => 'Tên vị trí',
            'type' => 'text',
            'class' => 'col-md-2',
            'query' => 'like'
        ],
        'note' => [
            'label' => 'Ghi chú',
            'type' => 'text',
            'query' => 'like'
        ],
    ];
    public function modules()
    {
        return $this->modules;
    }
    public function getFilters()
    {
        return $this->filters;
    }
    public function model()
    {
        return Unit::class;
    }
}
