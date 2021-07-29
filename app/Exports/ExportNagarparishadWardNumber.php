<?php

namespace App\Exports;

use App\Models\NagarparishadWardNumber;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportNagarparishadWardNumber implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NagarparishadWardNumber::all();
    }
}
