<?php

namespace App\Http\Livewire\Divyang\Create;

use Livewire\Component;

class StepOne extends Component
{
    public $castes, $states, $zones, $nagarparishads, $districts, $talukas, $villages, $mahanagarpalikas, $mahanagarpalikaWards, $nagarparishadWards, $addressProof;
    
    public $date_of_birth;

    protected $listeners = ["selectBirthDate" => 'getSelectBirthDate'];

    public function getSelectBirthDate($val)
    {
        $this->date_of_birth = $val;
    }

    public function mount()
    {
        $this->castes = [];
        $this->states = [];
        $this->districts = [];
        $this->talukas = [];
        $this->villages = [];
        $this->mahanagarpalikas = [];
        $this->mahanagarpalikaWards = [];
        $this->nagarparishadWards = [];
        $this->addressProof = [];
        $this->zones = [];
        $this->nagarparishads = [];
    }

    public function render()
    {
        return view('livewire.divyang.create.step-one');
    }
}
