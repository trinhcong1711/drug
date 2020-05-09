<?php

namespace App\Imports;

use App\Models\Unit;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UnitsImport implements ToCollection, WithHeadings
{
    protected $import;
    protected $title;

    public function __construct(array $import,array $title)
    {
        $this->import = $import;
        $this->title = $title;
    }

    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        $create =[];
        foreach ($rows as $row)
        {
            foreach ($this->import as $k=>$column){
                $create[$column] = $row[$k];
            }
            Unit::create($create);
        }
    }
    //Xác định hàng tiêu đề cho bảng
    public function headings() :array {
        return $this->title;
    }

}
