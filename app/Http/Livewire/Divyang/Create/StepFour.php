<?php

namespace App\Http\Livewire\Divyang\Create;

use App\Models\IdentityProof;
use Livewire\Component;

class StepFour extends Component
{
    public $identityProofs;

    public function mount()
    {
        $this->identityProofs = IdentityProof::all();
    }

    public function render()
    {
        return view('livewire.divyang.create.step-four');
    }
}
