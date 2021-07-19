<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

    public function taluka()
    {
        return $this->belongsTo('App\Models\Taluka');
    }

    public function area()
    {
        return $this->morphOne(User::class, 'areable');
    }
}
