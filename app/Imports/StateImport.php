<?php

namespace App\Imports;
use App\Models\Counrtry;

use App\Models\State;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StateImport implements ToModel,WithHeadingRow
{
     //protected $country_id;

    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   public function model(array $row)
{
    $countr_id = Country::where('name', $row[0])->first();
    return new User([
        'name' => $row[1],
    ]);
}
}
