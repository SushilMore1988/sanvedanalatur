<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\District;
use App\Models\State;
use App\Models\Mahanagarpalika as MahanagarpalikaModel;
use Livewire\Component;
use Livewire\WithPagination;

class Mahanagarpalika extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $name, $countries = [], $country, $states = [], $state, $districts = [], $district, $mahanagarpalika_id, $search = '';
    
    public $isShowCreate = false;

    public function mount()
    {
        $this->countries = Country::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.mahanagarpalika',[
            'mahanagarpalikas' => MahanagarpalikaModel::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'district' => 'required|exists:districts,id'
        ]);

        if(empty($this->mahanagarpalika_id)){
            $this->validate([
                'name' => 'unique:mahanagarpalikas,name'
            ]);
        }else{
            $this->validate([
                'name' => 'unique:mahanagarpalikas,name,'.$this->mahanagarpalika_id
            ]);
        }
        MahanagarpalikaModel::updateOrCreate(['id' => $this->mahanagarpalika_id],['district_id' => $this->district, 'name' => $this->name]);
      
        $this->resetCreateForm();

    }
    
    public function resetCreateForm()
    {
        $this->mahanagarpalikas = MahanagarpalikaModel::all();
        $this->district = '';
        $this->districts = [];
        $this->state = '';
        $this->states = [];
        $this->country = '';
        $this->name = '';
        $this->mahanagarpalika_id = null;

        $this->isShowCreate = false;
    }

    public function edit($id)
    {
        $mahanagarpalika = MahanagarpalikaModel::findOrFail($id);
        $this->mahanagarpalika_id = $id;
        $this->country = $mahanagarpalika->district->state->country_id;
        $this->states = State::where('country_id', $this->country)->pluck('name','id');
        $this->state = $mahanagarpalika->district->state_id;
        $this->districts = District::Where('state_id', $this->state)->pluck('name','id');
        $this->district = $mahanagarpalika->district_id;
        $this->name = $mahanagarpalika->name;
        
        
        $this->isShowCreate = true;
    }

    public function destroy($id)
    {
        MahanagarpalikaModel::findOrFail($id)->delete();
        $this->mahanagarpalikas = MahanagarpalikaModel::all();
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
}
