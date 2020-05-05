<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class UnitsExport  implements FromArray
{
    protected $export;

    public function __construct(array $export)
    {
        $this->export = $export;
    }
    public function array(): array
    {
        return $this->export;
    }
}
