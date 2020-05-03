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
//  Danh sách các fields của bộ lọc trong view list
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
    ];
//  Danh sách các cột trong view list
    protected $listColumns = [
        ['name' => 'name','label'=>'Tên','type'=>'col'],
        ['name' => 'note','label'=>'Chú thích', 'type'=>'col']
    ];

    public function getListColumns()
    {
        return $this->listColumns;
    }
    public function getModules()
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
