<?php

namespace App\Exports;

use App\Models\Nagarparishad;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportNagarparishad implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nagarparishad::all();
    }
}
