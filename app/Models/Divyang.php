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
