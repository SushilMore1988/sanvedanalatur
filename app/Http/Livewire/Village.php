<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Taluka;
use App\Models\Village as VillageModel;
use Livewire\WithPagination;

class Village extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $countries = [], $country, $states = [], $state, $district, $districts = [], $taluka, $talukas = [], $village_id, $search = '';

    public $isShowCreate = false;

    public function mount()
    {
        $this->countries = Country::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.village',[
            'villages' => VillageModel::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|unique:villages,name',
            'state' => 'required|exists:states,id',
            'country' => 'required|exists:countries,id',
            'district' => 'required|exists:districts,id',
            'taluka' => 'required|exists:talukas,id',
        ]);

        VillageModel::updateOrCreate(['id' => $this->village_id],['taluka_id' => $this->taluka, 'name' => $this->name]);

        $this->resetCreateForm();
    }

    public function resetCreateForm()
    {
        $this->villages = VillageModel::all();
        $this->name = '';
        $this->country = '';
        $this->state = '';
        $this->states = [];
        $this->district = '';
        $this->districts = [];
        $this->taluka = '';
        $this->talukas = [];
        $this->village_id = null;

        $this->isShowCreate = false;
    }

    public function edit($id)
    {
        $village = VillageModel::findOrFail($id);
        $this->village_id = $id;
        $this->name = $village->name;
        $this->country = $village->taluka->district->state->country_id;
        $this->states = State::where('country_id', $this->country)->pluck('name','id');
        $this->state = $village->taluka->district->state_id;
        $this->districts = District::Where('state_id', $this->state)->pluck('name','id');
        $this->district = $village->taluka->district_id;
        $this->talukas = Taluka::Where('district_id', $this->district)->pluck('name','id');
        $this->taluka = $village->taluka_id;
        
        $this->isShowCreate = true;
    }

    public function destroy($id)
    {
        VillageModel::findOrFail($id)->delete();
        $this->villages = VillageModel::all();
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
