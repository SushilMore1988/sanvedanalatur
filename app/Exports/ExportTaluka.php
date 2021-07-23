<?php

namespace App\Exports;

use App\Models\Taluka;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportTaluka implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Taluka::all();
    }
}
