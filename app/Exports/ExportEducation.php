<?php

namespace App\Exports;

use App\Models\DisabilityType;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportEducation implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DisabilityType::all();
    }
}
