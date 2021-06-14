<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function talukas()
    {
        return $this->hasMany('App\Models\Taluka');
    }

    public function nagarparishads()
    {
        return $this->hasMany('App\Models\Nagarparishad');
    }

    public function mahanagarpalikas()
    {
        return $this->hasMany('App\Models\Mahanagarpalika');
    }
}
