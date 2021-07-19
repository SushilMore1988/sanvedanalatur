<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\District;
use App\Models\State;
use App\Models\Mahanagarpalika;
use App\Models\Zone as ModelsZone;
use Livewire\Component;
use Livewire\WithPagination;

class Zone extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $name, $countries = [], $country, $states = [], $state, $districts = [], $district, $mahanagarpalikas = [], $mahanagarpalika, $zone_id, $search = '';
    
    public $isShowCreate = false;

    public function mount()
    {
        $this->countries = Country::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.zone',[
            'zones' => ModelsZone::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'mahanagarpalika' => 'required|exists:mahanagarpalikas,id'
        ]);

        if(empty($this->zone_id)){
            $this->validate([
                'name' => 'unique:zones,name'
            ]);
        }else{
            $this->validate([
                'name' => 'unique:zones,name,'.$this->zone_id
            ]);
        }
        ModelsZone::updateOrCreate(['id' => $this->zone_id],['mahanagarpalika_id' => $this->mahanagarpalika, 'name' => $this->name]);
      
        $this->resetCreateForm();

    }
    
    public function resetCreateForm()
    {
        $this->zones = ModelsZone::all();
        $this->mahanagarpalika = '';
        $this->mahanagarpalikas = [];
        $this->district = '';
        $this->districts = [];
        $this->state = '';
        $this->states = [];
        $this->country = '';
        $this->name = '';
        $this->zone_id = null;

        $this->isShowCreate = false;
    }

    public function edit($id)
    {
        $zone = ModelsZone::findOrFail($id);
        $this->zone_id = $id;
        $this->country = $zone->mahanagarpalika->district->state->country_id;
        $this->states = State::where('country_id', $this->country)->pluck('name','id');
        $this->state = $zone->mahanagarpalika->district->state_id;
        $this->districts = District::Where('state_id', $this->state)->pluck('name','id');
        $this->district = $zone->mahanagarpalika->district_id;
        $this->mahanagarpalikas = Mahanagarpalika::Where('district_id', $this->district)->pluck('name','id');
        $this->mahanagarpalika = $zone->mahanagarpalika_id;
        $this->name = $zone->name;
        
        $this->isShowCreate = true;
    }

    public function destroy($id)
    {
        ModelsZone::findOrFail($id)->delete();
        $this->zones = ModelsZone::all();
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
        $this->mahanagarpalikas = Mahanagarpalika::where('district_id', $this->district)->pluck('name','id');
    }
}
