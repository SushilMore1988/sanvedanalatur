<?php

namespace App\Exports;

use App\Models\Divyang;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDivyang implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Divyang::all();
    }
}
