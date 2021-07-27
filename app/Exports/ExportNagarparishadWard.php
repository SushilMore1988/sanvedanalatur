<?php

namespace App\Exports;

use App\Models\NagarparishadWard;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportNagarparishadWard implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NagarparishadWard::all();
    }
}
