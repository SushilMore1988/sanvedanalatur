<?php

namespace App\Exports;

use App\Models\Village;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportVillage implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Village::all();
    }
}
