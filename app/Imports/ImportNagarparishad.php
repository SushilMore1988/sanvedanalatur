<?php

namespace App\Imports;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Taluka;
use App\Models\Mahanagarpalika;
use App\Models\Nagarparishad;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportNagarparishad implements ToModel,WithHeadingRow
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
        $mahanagarpalikaModel = Mahanagarpalika::where('district_id', $districtModel->id)->where('name', ucfirst(trim($row['mahanagarpalika'])))->first();

        if(!$mahanagarpalikaModel){
            return new mahanagarpalika([
                'name' => ucfirst(trim($row['mahanagarpalika'])),
                'district_id' => $districtModel->id,
            ]);
        }
        $nagarparishadModel = Nagarparishad::where('taluka_id', $talukaModel->id)->where('name', ucfirst(trim($row['nagarparishad'])))->first();

        if(!$nagarparishadModel){
            return new nagarparishad([
                'name' => ucfirst(trim($row['nagarparishad'])),
                'taluka_id' => $talukaModel->id,
            ]);
        }

    }
}
