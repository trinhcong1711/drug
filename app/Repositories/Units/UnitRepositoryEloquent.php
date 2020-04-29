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
            'input' => 'input',
            'type' => 'text',
            'class' => 'col-md-2',
            'query' => 'like'
        ],
        'note' => [
            'label' => 'Ghi chú',
            'input' => 'input',
            'type' => 'text',
            'query' => 'like'
        ],
        'select' => [
            'label' => 'Select',
            'input' => 'select',
            'option' => [
                0 => 'Tắt',
                1 => 'Bật',
            ],
            'query' => '='
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
