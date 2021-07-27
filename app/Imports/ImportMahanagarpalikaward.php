<?php

namespace App\Imports;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Taluka;
use App\Models\Mahanagarpalika;
use App\Models\Mahanagarpalikaward;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\MahanagarpalikaWardNumber;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportMahanagarpalikaward implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
    //    var_dump($row);die();
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
        $mahanagarpalikawardModel = Mahanagarpalikaward::where('mahanagarpalika_id', $mahanagarpalikawardModel->id)->where('name', ucfirst(trim($row['mahanagarpalikaward'])))->first();

        if(!$mahanagarpalikawardModel){
            return new mahanagarpalikaward([
                'name' => ucfirst(trim($row['mahanagarpalikaward'])),
                'mahanagarpalika_id' => $mahanagarpalikawardModel->id,
                'zone_id' => $mahanagarpalikawardModel->id,

            ]);
        }
    }

}
