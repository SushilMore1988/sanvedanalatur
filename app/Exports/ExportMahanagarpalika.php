<?php

namespace App\Exports;

use App\Models\Mahanagarpalika;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportMahanagarpalika implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mahanagarpalika::all();
    }
}
