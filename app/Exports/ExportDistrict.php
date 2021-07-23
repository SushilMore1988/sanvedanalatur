<?php

namespace App\Exports;

use App\Models\District;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDistrict implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return District::all();
    }
}
