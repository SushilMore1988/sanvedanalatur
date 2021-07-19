<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\District;
use App\Models\Mahanagarpalika;
use App\Models\Nagarparishad;
use App\Models\Role;
use App\Models\State;
use App\Models\Taluka;
use App\Models\User;
use App\Models\Zone;
use App\Models\Village;
use App\Models\MahanagarpalikaWardNumber;
use App\Models\NagarparishadWardNumber;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleCanViewData;

class Admin extends Component
{
    public $createAdmin = false, $user_id = null;
    
    public $showCountry = false, $showState = false, $showDistrict = false, $showTaluka = false, $showVillage = false, $showCity = false, $showNagarparishad = false, $showNagarparishadWardNumber = false, $showMahanagarpalika = false, $showZone = false, $showMahanagarpalikaWardNumber = false;

    public $country, $state, $district, $taluka, $village, $city, $nagarparishad, $nagarparishadWardNumber, $mahanagarpalika, $zone, $mahanagarpalikaWardNumber;

    public $name, $email, $phone, $password;

    public $states = [];
    public $districts = [];
    public $talukas = [];
    public $cities = [];
    public $villages = [];
    public $mahanagarpalikas = [];
    public $zones = [];
    public $mahanagarpalikaWardNumbers = [];
    public $nagarparishads = [];
    public $nagarparishadWardNumbers = [];

    public $search = '';

    public $role, $area;

    public function render()
    {
        $roleArray = RoleCanViewData::where('role_id', Auth::user()->roles()->first()->id)->pluck('view_role_id');
        $roles = Role::whereIn('id', $roleArray)->pluck('name');
        $users = $this->getBelongingUsers(str_replace('App\Models\\', '', Auth::user()->areable_type), Auth::user()->areable_id, Auth::id());
        return view('livewire.admin', [
            'users' => $users,
            'roles' => $roles,
            'countries' => Country::pluck('name', 'id')
        ]);
    }

    public function  getBelongingUsers($model, $model_id, $user_id){
        // dd($model . ' ' . $model_id . ' ' . $user_id);
        $users = [];
        
        if($model == 'Country'){
            
        }elseif($model == 'State'){

        }elseif($model == 'District'){
            
        }elseif($model == 'Taluka'){
            
        }elseif($model == 'Mahanagarpalika'){
            $zones = Zone::where('mahanagarpalika_id', $model_id)->pluck('id');
            $mahanagarpalikaWardNumbers = MahanagarpalikaWardNumber::where('mahanagarpalika_id', $model_id)->pluck('id');
            if($zones->count() > 0 || $mahanagarpalikaWardNumbers->count() > 0){
                $users = User::where(function($query) use($zones){
                                if($zones->count() > 0){
                                    return $query->whereIn('areable_id', $zones)->where('areable_type', 'App\Models\Zone');
                                }
                            })->orWhere(function($query) use($mahanagarpalikaWardNumbers) {
                                if($mahanagarpalikaWardNumbers->count() > 0){
                                    return $query->whereIn('areable_id', $mahanagarpalikaWardNumbers)->where('areable_type', 'App\Models\MahanagarpalikaWardNumber');
                                }
                            })
                            ->get();
            }
        }elseif($model == 'Zone'){
            
        }elseif($model == 'MahanagarpalikaWardNumber'){
            return $users;
        }elseif($model == 'Nagarparishad'){
            
        }elseif($model == 'NagarparishadWardNumber'){
            return $users;    
        }elseif($model == 'Village'){
            return $users;
        }

        return $users;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        
    }

    public function roleChanged()
    {
        $this->area = Role::findOrFail($this->role)->area->name;

        if($this->area == 'Country'){
            $this->showCountry = true;
        }
        if($this->area == 'State'){
            $this->showCountry = true;
            $this->showState = true;
        }
        if($this->area == 'District'){
            $this->showCountry = true;
            $this->showState = true;
            $this->showDistrict = true;
        }
        if($this->area == 'Taluka'){
            $this->showCountry = true;
            $this->showState = true;
            $this->showDistrict = true;
            $this->showTaluka = true;
        }
        if($this->area == 'Village'){
            $this->showCountry = true;
            $this->showState = true;
            $this->showDistrict = true;
            $this->showTaluka = true;
            $this->showVillage = true;
        }
        if($this->area == 'City'){
            $this->showCountry = true;
            $this->showState = true;
            $this->showDistrict = true;
            $this->showTaluka = true;
            $this->showCity = true;
        }
        if($this->area == 'Mahanagarpalika'){
            $this->showCountry = true;
            $this->showState = true;
            $this->showDistrict = true;
            // $this->showTaluka = true;
            $this->showMahanagarpalika = true;
        }
        if($this->area == 'Zone'){
            $this->showCountry = true;
            $this->showState = true;
            $this->showDistrict = true;
            // $this->showTaluka = true;
            $this->showMahanagarpalika = true;
            $this->showZone = true;
        }
        if($this->area == 'MahanagarpalikaWardNumber'){
            $this->showCountry = true;
            $this->showState = true;
            $this->showDistrict = true;
            // $this->showTaluka = true;
            $this->showMahanagarpalika = true;
            $this->showZone = true;
            $this->showMahanagarpalikaWardNumber = true;
        }
        if($this->area == 'Nagarparishad'){
            $this->showCountry = true;
            $this->showState = true;
            $this->showDistrict = true;
            $this->showTaluka = true;
            $this->showNagarparishad = true;
        }
        if($this->area == 'NagarparishadWardNumber'){
            $this->showCountry = true;
            $this->showState = true;
            $this->showDistrict = true;
            $this->showTaluka = true;
            $this->showNagarparishad = true;
            $this->showNagarparishadWardNumber = true;
        }
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
        $this->mahanagarpalikas = Mahanagarpalika::where('district_id', $this->district)->pluck('name','id');
        // $this->cities = City::where('district_id', $this->district)->pluck('name','id');
        // $this->nagarparishads = Nagarparishad::where('district_id', $this->district)->pluck('name','id');
    }

    public function changedTaluka()
    {
        $this->cities = City::where('taluka_id', $this->taluka)->pluck('name','id');
        $this->villages = Village::where('taluka_id', $this->taluka)->pluck('name','id');
    }

    public function changedNagarparishad()
    {
        $this->nagarparishadWardNumbers = NagarparishadWardNumber::where('nagarparishad_id', $this->nagarparishad)->pluck('name','id');
    }
    
    public function changedMahanagarpalika()
    {
        $this->zones = Zone::where('mahanagarpalika_id', $this->mahanagarpalika)->pluck('name','id');
    }

    public function changedMahanagarpalikaWardNumber()
    {
        
    }
    
    public function changedZone()
    {
        $this->mahanagarpalikaWardNumbers = MahanagarpalikaWardNumber::where('zone_id', $this->zone)->pluck('name','id');
    }
    
    public function store()
    {
        $this->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'password' => 'required',
            'role' => 'required',
        ]);
        $role = Role::findOrFail($this->role);
        $area = $role->area->name;
        if(empty($this->user_id)){
            $user = new User();
        }else{
            $user = User::findOrFail($this->user_id);
            $this->user_id = null;
        }
        $user->name = $this->name;
        $user->phone = $this->phone;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->areable_type = 'App\Models\\'.$area;
        if($area == 'Country'){
            $user->areable_id = $this->country;
        }
        if($area == 'State'){
            $user->areable_id = $this->state;
        }
        if($area == 'District'){
            $user->areable_id = $this->district;
        }
        if($area == 'Taluka'){
            $user->areable_id = $this->taluka;
        }
        if($area == 'Village'){
            $user->areable_id = $this->village;
        }
        if($area == 'Mahanagarpalika'){
            $user->areable_id = $this->mahanagarpalika;
        }
        if($area == 'Zone'){
            $user->areable_id = $this->zone;
        }
        if($area == 'MahanagarpalikaWardNumber'){
            $user->areable_id = $this->mahanagarpalikaWardNumber;
        }
        if($area == 'Nagarparishad'){
            $user->areable_id = $this->nagarparishad;
        }
        if($area == 'NagarparishadWardNumber'){
            $user->areable_id = $this->nagarparishadWardNumber;
        }
        
        $user->save();

        $user->assignRole($role->id);

        $this->resetForm();

        $this->createAdmin = false;
    }

    public function resetForm(){
        $this->city = '';
        $this->nagarparishadWardNumber = '';
        $this->nagarparishad = '';
        $this->mahanagarpalikaWardNumber = '';
        $this->mahanagarpalikaZone = '';
        $this->mahanagarpalika = '';
        $this->village = '';
        $this->taluka = '';
        $this->district = '';
        $this->state = '';
        $this->country = '';
        $this->role = '';
        $this->name = '';
        $this->phone = '';
        $this->email = '';
        $this->password = '';
    }

    public function edit($user_id)
    {
        $this->createAdmin = true;
        $this->user_id = $user_id;
    }
}
