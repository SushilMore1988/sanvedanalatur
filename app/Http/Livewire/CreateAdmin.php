<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Role;
use App\Models\State;
use App\Models\District;
use App\Models\Taluka;
use Livewire\Component;

class CreateAdmin extends Component
{
    public $roles, $country, $state, $district, $taluka, $city, $nagarparishad, $nagarparishadWardNumber, $mahanagarpalika, $zone, $mahanagarpalikaWardNumber, $village, $name, $phone, $password;
    public $states, $districts, $talukas, $cities, $nagarparishads, $nagarparishadWardNumbers, $mahanagarpalikas, $mahanagarpalikaWardNumbers, $zones, $villages;

    public function mount()
    {
        
        $this->states = [];
        $this->districts = [];
        $this->talukas = [];
        $this->cities = [];
        $this->nagarparishads = [];
        $this->nagarparishadWardNumbers = [];
        $this->mahanagarpalikas = [];
        $this->mahanagarpalikaWardNumbers = [];
        $this->zones = [];
        $this->villages = [];
        $this->roles = Role::pluck('name', 'id');
    }

    public function render()
    {
        $countries = Country::pluck('name', 'id');
        return view('livewire.create-admin', [
            'countries' => $countries,
        ]);
    }
    public function changedCountry()
    {
        $this->states = State::where('country_id', $this->country)->pluck('name','id');
    }
    public function changedState()
    {
        $this->districts = District::where('state_id', $this->state)->pluck('name','id');
    }
    public function changedDistrict()
    {
        $this->talukas = Taluka::where('district_id', $this->district)->pluck('name','id');
    }
    public function changedTaluka()
    {
        $this->talukas = Taluka::where('district_id', $this->district)->pluck('name','id');
    }
    public function changedCity()
    {
        $this->talukas = Taluka::where('district_id', $this->district)->pluck('name','id');
    }
    public function changedNagarparishad()
    {
        $this->talukas = Taluka::where('district_id', $this->district)->pluck('name','id');
    }
    public function changedNagarparishadWardNumber()
    {
        $this->talukas = Taluka::where('district_id', $this->district)->pluck('name','id');
    }
    public function changedMahanagarpalika()
    {
        $this->talukas = Taluka::where('district_id', $this->district)->pluck('name','id');
    }
    public function changedZone()
    {
        $this->talukas = Taluka::where('district_id', $this->district)->pluck('name','id');
    }
    public function changedMahanagarpalikaWardNumber()
    {
        $this->talukas = Taluka::where('district_id', $this->district)->pluck('name','id');
    }
    public function changedVillage()
    {
        $this->talukas = Taluka::where('district_id', $this->district)->pluck('name','id');
    }
}
