<?php

namespace App\Exports;

use App\Models\Caste;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportCaste implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Caste::all();
    }
}
