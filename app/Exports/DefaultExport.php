<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class DefaultExport implements FromArray
{

    protected $defaultExport;

    public function __construct(array $defaultExport)
    {
        $this->defaultExport = $defaultExport;
    }

    public function array(): array
    {
        return $this->defaultExport;
    }
//    public function array(): array
//    {
//        return [
//            ['Tên', 'Ghi chú'],
//            ['Nhập tên vị trí','Nhập ghi chú cho vị trí']
//        ];
//    }
}
