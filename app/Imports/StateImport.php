<?php

namespace App\Imports;

use App\Models\State;
use App\Models\Country;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StateImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $countryModel = Country::where('name', ucfirst(trim($row['country'])))->first();
        
        if(!$countryModel){
            $countryModel = Country::create(['name' => ucfirst(trim($row['country']))]);
        }

        $stateModel = State::where('country_id', $countryModel->id)->where('name', ucfirst(trim($row['state'])))->first();

        if(!$stateModel){
            return new State([
                'name' => ucfirst(trim($row['state'])),
                'country_id' => $countryModel->id,
            ]);
        }
    }
}
