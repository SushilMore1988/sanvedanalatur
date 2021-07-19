<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\District;
use App\Models\State;
use App\Models\Mahanagarpalika;
use App\Models\MahanagarpalikaWardNumber as ModelsMahanagarpalikaWardNumber;
use App\Models\Zone;
use Livewire\Component;
use Livewire\WithPagination;

class MahanagarpalikaWardNumber extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $name, $countries = [], $country, $states = [], $state, $districts = [], $district, $mahanagarpalikas = [], $mahanagarpalika, $zones= [], $zone, $ward_id, $search = '';
    
    public $isShowCreate = false;

    public function mount()
    {
        $this->countries = Country::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.mahanagarpalika-ward-number',[
            'wards' => ModelsMahanagarpalikaWardNumber::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'zone' => 'required|exists:zones,id'
        ]);

        if(empty($this->ward_id)){
            $this->validate([
                'name' => 'unique:mahanagarpalika_ward_numbers,name'
            ]);
        }else{
            $this->validate([
                'name' => 'unique:mahanagarpalika_ward_numbers,name,'.$this->ward_id
            ]);
        }
        ModelsMahanagarpalikaWardNumber::updateOrCreate(['id' => $this->ward_id],['zone_id' => $this->zone, 'mahanagarpalika_id' => $this->mahanagarpalika, 'name' => $this->name]);
      
        $this->resetCreateForm();

    }
    
    public function resetCreateForm()
    {
        $this->wards = ModelsMahanagarpalikaWardNumber::all();
        $this->zone = '';
        $this->zones = [];
        $this->mahanagarpalika = '';
        $this->mahanagarpalikas = [];
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
        $ward = ModelsMahanagarpalikaWardNumber::findOrFail($id);
        $this->ward_id = $id;
        $this->country = $ward->zone->mahanagarpalika->district->state->country_id;
        $this->states = State::where('country_id', $this->country)->pluck('name','id');
        $this->state = $ward->zone->mahanagarpalika->district->state_id;
        $this->districts = District::Where('state_id', $this->state)->pluck('name','id');
        $this->district = $ward->zone->mahanagarpalika->district_id;
        $this->mahanagarpalikas = Mahanagarpalika::Where('district_id', $this->district)->pluck('name','id');
        $this->mahanagarpalika = $ward->zone->mahanagarpalika_id;
        $this->zones = Zone::where('mahanagarpalika_id', $this->mahanagarpalika)->pluck('name','id');
        $this->zone = $ward->zone_id;
        $this->name = $ward->name;
        
        $this->isShowCreate = true;
    }

    public function destroy($id)
    {
        ModelsMahanagarpalikaWardNumber::findOrFail($id)->delete();
        $this->wards = ModelsMahanagarpalikaWardNumber::all();
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

    public function changedMahanagarpalika()
    {
        $this->zones = Zone::where('mahanagarpalika_id', $this->mahanagarpalika)->pluck('name','id');
    }
}
