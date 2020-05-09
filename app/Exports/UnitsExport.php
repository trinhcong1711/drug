<?php

namespace App\Exports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UnitsExport  implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Unit::select('name','note')->get();
    }
    //Thêm hàng tiêu đề cho bảng
    public function headings() :array {
        return ["Tên", "Ghi chú"];
    }
}
