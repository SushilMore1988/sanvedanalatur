<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Role;
use Livewire\Component;

class CreateAdmin extends Component
{
    public $roles, $country = true, $state = false, $district = false, $taluka = false, $city = false, $nagarparishad = false, $nagarparishadWardNumber = false, $mahanagarpalika = false, $zone = false, $mahanagarpalikaWardNumber = false, $village = false;
    public $countries, $states, $districts, $talukas, $cities, $nagarparishads, $nagarparishadWardNumbers, $mahanagarpalikas, $mahanagarpalikaWardNumbers, $zones, $villages;

    public function mount()
    {
        $this->countries = Country::pluck('name', 'id');
        $this->roles = Role::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.create-admin');
    }
}
