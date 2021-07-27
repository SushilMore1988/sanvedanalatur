<?php

namespace App\Imports;

use App\Models\DisabilityArea;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportDisabilityArea implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //var_dump($row);die();

        return new DisabilityArea([
            'area'     => @$row[area]
        ]);
    }
}
