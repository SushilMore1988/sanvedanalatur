<?php

namespace App\Exports;

use App\Models\Occupation;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportOccupation implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Occupation::all();
    }
}
