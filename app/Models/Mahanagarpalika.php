<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahanagarpalika extends Model
{
    use HasFactory;

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }
    
    public function zones()
    {
        return $this->hasMany('App\Models\Zone');
    }

    public function mahanagarpalikaWardNumbers()
    {
        return $this->hasMany('App\Models\MahanagarpalikaWardNumber');
    }
    
}
