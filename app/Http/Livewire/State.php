<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\State as StateModel;
use Livewire\Component;
use Livewire\WithPagination;

class State extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $name, $countries, $country, $state_id, $search = '';
    
    public $isShowCreate = false;

    public function mount()
    {
        $this->countries = Country::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.state',[
            'states' => StateModel::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'country' => 'required|exists:countries,id'
        ]);

        if(empty($this->state_id)){
            $this->validate([
                'name' => 'unique:states,name'
            ]);
        }else{
            $this->validate([
                'name' => 'unique:states,name,'.$this->state_id
            ]);
        }

        StateModel::updateOrCreate(['id' => $this->state_id],['country_id' => $this->country, 'name' => $this->name]);

        $this->resetCreateForm();

        $this->isShowCreate = false;
    }
    
    public function resetCreateForm()
    {
        $this->states = StateModel::all();
        $this->name = '';
        $this->country = '';
        $this->state_id = null;
    }

    public function edit($id)
    {
        $state = StateModel::findOrFail($id);
        $this->state_id = $id;
        $this->name = $state->name;
        $this->country = $state->country_id;
        $this->isShowCreate = true;
    }

    public function destroy($id)
    {
        StateModel::findOrFail($id)->delete();
        $this->states = StateModel::all();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
