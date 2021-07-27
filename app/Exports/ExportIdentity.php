<?php

namespace App\Exports;

use App\Models\IdentityProof;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportIdentity implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IdentityProof::all();
    }
}
