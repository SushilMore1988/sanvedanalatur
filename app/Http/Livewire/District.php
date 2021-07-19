<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\State;
use App\Models\District as DistrictModel;
use Livewire\WithPagination;

class District extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $countries = [], $country, $states = [], $state, $district_id, $search = '';

    public $isShowCreate = false;

    public function mount()
    {
        $this->countries = Country::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.district',[
            'districts' => DistrictModel::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'state' => 'required|exists:states,id',
            'country' => 'required|exists:countries,id',
        ]);
        if(empty($this->district_id)){
            $this->validate([
                'name' => 'unique:districts,name'
            ]);
        }else{
            $this->validate([
                'name' => 'unique:districts,name,'.$this->district_id
            ]);
        }
        DistrictModel::updateOrCreate(['id' => $this->district_id],['state_id' => $this->state, 'name' => $this->name]);

        $this->resetCreateForm();

    }
    
    public function resetCreateForm()
    {
        $this->districts = DistrictModel::all();
        $this->state = '';
        $this->states = [];
        $this->name = '';
        $this->country = '';
        $this->district_id = null;
        $this->isShowCreate = false;
    }

    public function edit($id)
    {
        $district = DistrictModel::findOrFail($id);
        $this->district_id = $id;
        $this->name = $district->name;
        $this->country = $district->state->country_id;
        $this->states = State::where('country_id', $this->country)->pluck('name','id');
        $this->state = $district->state_id;
        $this->isShowCreate = true;
    }

    public function destroy($id)
    {
        DistrictModel::findOrFail($id)->delete();
        $this->districts = DistrictModel::all();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function changedCountry()
    {
        $this->states = State::where('country_id', $this->country)->pluck('name','id');
    }
}
