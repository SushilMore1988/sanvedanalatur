<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';

    //public $primaryKey = 'id';

    protected $fillable = [
        'name', 'country_id'
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function districts()
    {
        return $this->hasMany('App\Models\District');
    }

    public function area()
    {
        return $this->morphOne(User::class, 'areable');
    }
}
