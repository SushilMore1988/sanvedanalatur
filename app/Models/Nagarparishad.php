<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nagarparishad extends Model
{
    use HasFactory;

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

    public function nagarparishadWardNumbers()
    {
        return $this->hasMany('App\Models\NagarparishadWardNumber');
    }
}
