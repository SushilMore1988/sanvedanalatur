<?php

namespace App\Exports;

use App\Models\DisabilityReason;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportReason implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DisabilityReason::all();
    }
}
