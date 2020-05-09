<?php

namespace App\Exports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UnitsExport  implements FromCollection, WithHeadings
{
    protected $export;
    protected $title;

    public function __construct(array $export,array $title)
    {
        $this->export = $export;
        $this->title = $title;
    }

    public function collection()
    {
        return Unit::select($this->export)->get();
    }
    //Thêm hàng tiêu đề cho bảng
    public function headings() :array {
        return $this->title;
    }
}
