<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\District;
use App\Models\State;
use App\Models\Taluka;
use App\Models\Nagarparishad;
use Livewire\Component;
use Livewire\WithPagination;

class Nagarpalika extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $name, $countries = [], $country, $states = [], $state, $districts = [], $district, $taluka, $talukas = [], $nagarpalika_id, $search = '';
    
    public $isShowCreate = false;

    public function mount()
    {
        $this->countries = Country::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.nagarpalika',[
            'nagarparishads' => Nagarparishad::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'district' => 'required|exists:districts,id'
        ]);

        if(empty($this->nagarpalika_id)){
            $this->validate([
                'name' => 'unique:nagarparishads,name'
            ]);
        }else{
            $this->validate([
                'name' => 'unique:nagarparishads,name,'.$this->nagarpalika_id
            ]);
        }
        Nagarparishad::updateOrCreate(['id' => $this->nagarpalika_id],['taluka_id' => $this->taluka, 'name' => $this->name]);
      
        $this->resetCreateForm();

    }
    
    public function resetCreateForm()
    {
        $this->mahanagarpalikas = Nagarparishad::all();
        $this->taluka = '';
        $this->talukas = [];
        $this->district = '';
        $this->districts = [];
        $this->state = '';
        $this->states = [];
        $this->country = '';
        $this->name = '';
        $this->nagarpalika_id = null;

        $this->isShowCreate = false;
    }

    public function edit($id)
    {
        $nagarpalika = Nagarparishad::findOrFail($id);
        $this->nagarpalika_id = $id;
        $this->country = $nagarpalika->taluka->district->state->country_id;
        $this->states = State::where('country_id', $this->country)->pluck('name','id');
        $this->state = $nagarpalika->taluka->district->state_id;
        $this->districts = District::Where('state_id', $this->state)->pluck('name','id');
        $this->district = $nagarpalika->taluka->district_id;
        $this->talukas = Taluka::Where('district_id', $this->district)->pluck('name','id');
        $this->taluka = $nagarpalika->taluka_id;
        $this->name = $nagarpalika->name;
        
        $this->isShowCreate = true;
    }

    public function destroy($id)
    {
        Nagarparishad::findOrFail($id)->delete();
        $this->mahanagarpalikas = Nagarparishad::all();
    }

    public function updatingSearch()
    {
        $this->resetPage();
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
}
