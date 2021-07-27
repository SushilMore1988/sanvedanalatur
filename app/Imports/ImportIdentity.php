<?php

namespace App\Imports;

use App\Models\IdentityProof;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportIdentity implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new IdentityProof([
            'name'     => @$row[name]
        ]);
    }
}
