<?php

namespace App\Imports;

use App\Models\DisabilityReason;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportReason implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DisabilityReason([
            'reason'     => @$row[reason]

        ]);
    }
}
