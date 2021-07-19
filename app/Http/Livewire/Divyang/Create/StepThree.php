<?php

namespace App\Http\Livewire\Divyang\Create;

use App\Models\Occupation;
use Livewire\Component;

class StepThree extends Component
{
    public $occupations;

    public function mount()
    {
        $this->occupations = Occupation::all();

    }
    public function render()
    {
        return view('livewire.divyang.create.step-three');
    }
}
