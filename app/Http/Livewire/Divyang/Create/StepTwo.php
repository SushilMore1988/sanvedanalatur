<?php

namespace App\Http\Livewire\Divyang\Create;

use App\Models\DisabilityArea;
use App\Models\DisabilityReason;
use App\Models\DisabilityType;
use App\Models\DivyangGoods;
use App\Models\Hospital;
use Livewire\Component;

class StepTwo extends Component
{
    public $disabilityTypes, $disabilityReasons, $hospitals, $disability_by_birth,$disabilityAreas, $divyangGoods;

    public function mount()
    {
        $this->divyangGoods = DivyangGoods::all();
        $this->disabilityTypes = DisabilityType::all();
        $this->disabilityAreas = DisabilityArea::all();
        $this->disabilityReasons = DisabilityReason::pluck('reason', 'id');
        $this->hospitals = Hospital::pluck('name', 'id');
        $this->disability_by_birth = 'No';
    }

    public function render()
    {
        return view('livewire.divyang.create.step-two');
    }
}
