<?php

namespace App\Exports;

use App\Models\DisabilityArea;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDisabilityArea implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DisabilityArea::all();
    }
}
