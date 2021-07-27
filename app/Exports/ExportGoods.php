<?php

namespace App\Exports;

use App\Models\DivyangGoods;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportGoods implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DivyangGoods::all();
    }
}
