<?php

namespace App\Imports;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportDistrict implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $primaryKey = 'state_id';

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
    }
}

