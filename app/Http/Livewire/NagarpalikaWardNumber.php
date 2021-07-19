<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\District;
use App\Models\State;
use App\Models\Taluka;
use App\Models\Nagarparishad;
use App\Models\NagarparishadWardNumber;
use Livewire\Component;
use Livewire\WithPagination;

class NagarpalikaWardNumber extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $name, $countries = [], $country, $states = [], $state, $districts = [], $district, $taluka, $talukas = [], $nagarparishad, $nagarparishads = [], $ward_id, $search = '';
    
    public $isShowCreate = false;

    public function mount()
    {
        $this->countries = Country::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.nagarpalika-ward-number',[
            'nagarparishadWards' => NagarparishadWardNumber::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'nagarparishad' => 'required|exists:nagarparishads,id'
        ]);

        if(empty($this->ward_id)){
            $this->validate([
                'name' => 'unique:nagarparishad_ward_numbers,name'
            ]);
        }else{
            $this->validate([
                'name' => 'unique:nagarparishad_ward_numbers,name,'.$this->ward_id
            ]);
        }
        NagarparishadWardNumber::updateOrCreate(['id' => $this->ward_id],['nagarparishad_id' => $this->nagarparishad, 'name' => $this->name]);
      
        $this->resetCreateForm();

    }
    
    public function resetCreateForm()
    {
        $this->nagarparishadWards = NagarparishadWardNumber::all();
        $this->nagarparishad = '';
        $this->nagarparishads = [];
        $this->taluka = '';
        $this->talukas = [];
        $this->district = '';
        $this->districts = [];
        $this->state = '';
        $this->states = [];
        $this->country = '';
        $this->name = '';
        $this->ward_id = null;

        $this->isShowCreate = false;
    }

    public function edit($id)
    {
        $nagarpalikaWard = NagarparishadWardNumber::findOrFail($id);
        $this->ward_id = $id;
        $this->country = $nagarpalikaWard->nagarparishad->taluka->district->state->country_id;
        $this->states = State::where('country_id', $this->country)->pluck('name','id');
        $this->state = $nagarpalikaWard->nagarparishad->taluka->district->state_id;
        $this->districts = District::Where('state_id', $this->state)->pluck('name','id');
        $this->district = $nagarpalikaWard->nagarparishad->taluka->district_id;
        $this->talukas = Taluka::Where('district_id', $this->district)->pluck('name','id');
        $this->taluka = $nagarpalikaWard->nagarparishad->taluka_id;
        $this->nagarparishads = Nagarparishad::Where('taluka_id', $this->taluka)->pluck('name','id');
        $this->nagarparishad = $nagarpalikaWard->nagarparishad_id;
        $this->name = $nagarpalikaWard->name;
        
        $this->isShowCreate = true;
    }

    public function destroy($id)
    {
        NagarparishadWardNumber::findOrFail($id)->delete();
        $this->nagarparishadWards = NagarparishadWardNumber::all();
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

    public function changedTaluka()
    {
        $this->nagarparishads = Nagarparishad::where('taluka_id', $this->taluka)->pluck('name','id');
    }
}
