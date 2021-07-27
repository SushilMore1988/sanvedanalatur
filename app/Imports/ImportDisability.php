<?php

namespace App\Imports;

use App\Models\DisabilityType;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportDisability implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DisabilityType([
            'type'     => @$row[type]
        ]);
    }
}
