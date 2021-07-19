<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taluka extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'district_id',
    ];

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }
    
    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function villages()
    {
        return $this->hasMany('App\Models\Village');
    }

    public function area()
    {
        return $this->morphOne(User::class, 'areable');
    }
}
