<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Taluka as TalukaModel;
use Livewire\WithPagination;

class Taluka extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name ,$countries ,$country ,$states ,$state ,$district ,$districts ,$taluka_id ,$search = '';

    public $isShowCreate = false;

    public function mount()
    {
        $this->states = State::pluck('name', 'id');
        $this->countries = Country::pluck('name', 'id');
        $this->districts = District::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.taluka',[
            'talukas' => TalukaModel::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|unique:talukas,name',
            'state' => 'required|exists:states,id',
            'country' => 'required|exists:countries,id',
            'district' => 'required|exists:districts,id',
        ]);

        TalukaModel::updateOrCreate(['id' => $this->taluka_id],['state_id' => $this->state,'district_id' => $this->district,'name' => $this->name]);

        $this->resetCreateForm();

        $this->isShowCreate = false;
    }

    public function resetCreateForm()
    {
        $this->talukas = TalukaModel::all();
        $this->name = '';
        $this->country = '';
        $this->state = '';
        $this->district = '';
        $this->taluka_id = null;
    }

    public function edit($id)
    {
        $taluka = TalukaModel::findOrFail($id);
        $this->taluka_id = $id;
        $this->name = $taluka->name;
        $this->state = $taluka->state_id;
        $this->district = $taluka->district_id;
        $this->country = $taluka->country_id;
        $this->isShowCreate = true;
    }

    public function destroy($id)
    {
        TalukaModel::findOrFail($id)->delete();
        $this->talukas = TalukaModel::all();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
