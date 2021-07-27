<?php

namespace App\Imports;

use App\Models\DivyangGoods;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportGoods implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DivyangGoods([
            'name'     => @$row[name]
        ]);
    }
}
