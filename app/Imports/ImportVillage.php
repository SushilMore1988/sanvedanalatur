<?php

namespace App\Imports;

use App\Models\Village;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Taluka;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportVillage implements ToModel,WithHeadingRow
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
        $stateModel = State::where('country_id', $countryModel->id)->where('name', ucfirst(trim($row['state'])))->first();

        $districtModel = District::where('state_id', $stateModel->id)->where('name', ucfirst(trim($row['district'])))->first();

        if(!$districtModel){
            return new district([
                'name' => ucfirst(trim($row['district'])),
                'state_id' => $stateModel->id,
            ]);
        }
        $talukaModel = Taluka::where('district_id', $districtModel->id)->where('name', ucfirst(trim($row['taluka'])))->first();

        if(!$talukaModel){
            return new taluka([
                'name' => ucfirst(trim($row['taluka'])),
                'district_id' => $districtModel->id,
            ]);
        }
        $villageModel = Village::where('taluka_id', $talukaModel->id)->where('name', ucfirst(trim($row['village'])))->first();

        if(!$villageModel){
            return new village([
                'name' => ucfirst(trim($row['village'])),
                'taluka_id' => $talukaModel->id,
            ]);
        }

    }
}
