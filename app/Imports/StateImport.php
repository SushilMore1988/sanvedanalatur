<?php

namespace App\Imports;
use App\Models\Counrtry;

use App\Models\State;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StateImport implements ToModel,WithHeadingRow
{
     protected $country_id;

    public function __construct($Counrtry)
    {
        $country_id = Country::where('name', $Country)->first()->id;
        $this->country_id = $country_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        var_dump($row);die();
        return new State([
            "name"=> $row["name"],
            "country_id"=> $this->country_id,

        ]);    
                }
}
