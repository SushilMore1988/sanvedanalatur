<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Divyang extends Model
{
    use HasFactory;

    /**
     * The roles that belong to the user.
     */
    public function disabilityTypes()
    {
        return $this->belongsToMany(DisabilityType::class);
    }

    /**
     * The roles that belong to the user.
     */
    public function disabilityTypeDivyang()
    {
        return $this->hasMany(DisabilityTypeDivyang::class);
    }

    public function disabilityAreas()
    {
        return $this->belongsToMany(DisabilityArea::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function caste()
    {
        return $this->belongsTo(Caste::class);
    }

    public function mahanagarpalika()
    {
        return $this->belongsTo(Mahanagarpalika::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function mahanagarpalikaWardNumber()
    {
        return $this->belongsTo(MahanagarpalikaWardNumber::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function nagarparishad()
    {
        return $this->belongsTo(Nagarparishad::class);
    }

    public function nagarparishadWardNumber()
    {
        return $this->belongsTo(NagarparishadWardNumber::class);
    }

    public function taluka()
    {
        return $this->belongsTo(Taluka::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function reason()
    {
        return $this->belongsTo(DisabilityReason::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function divyangGoods()
    {
        return $this->belongsTo(DivyangGoods::class);
    }

    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }

    public function identityProof()
    {
        return $this->belongsTo(IdentityProof::class);
    }

    public function scopeWithArea($query)
    {
        $user = User::find(Auth::id());
        if($user->hasRole(['Admin'])){
            return $query;
        }elseif($user->hasRole(['Gramsevak'])){
            return $query->where('village_id', $user->areable_id)->where('local_gov_institution', 'Grampanchayat');
        }elseif($user->hasRole(['BDO'])){
            return $query->where('taluka', $user->areable_id)->where('local_gov_institution', 'Grampanchayat');
        }elseif($user->hasRole(['CEO'])){
            return $query->where('district_id', $user->areable_id)->where('local_gov_institution', 'Grampanchayat');
        }elseif($user->hasRole(['Commisioner'])){
            return $query->where('mahanagarpalika_id', $user->areable_id)->where('local_gov_institution', 'Mahanagarpalika');
        }elseif($user->hasRole(['Mahanagarpalika Ward Officer'])){
            return $query->where('mahanagarpalika_ward_number_id', $user->areable_id)->where('local_gov_institution', 'Mahanagarpalika');
        }elseif($user->hasRole(['City Concile'])){
            return $query->where('nagarparishad_id', $user->areable_id)->where('local_gov_institution', 'Nagarparishad');
        }elseif($user->hasRole(['Nagarparishad Ward Officer'])){
            return $query->where('nagarparishad_ward_officer_id', $user->areable_id)->where('local_gov_institution', 'Nagarparishad');
        }elseif($user->hasRole(['Divyang'])){
            return $query;
        }
    }
}
