<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nagarparishad extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'taluka_id'
    ];

    public function taluka()
    {
        return $this->belongsTo('App\Models\Taluka');
    }

    public function nagarparishadWardNumbers()
    {
        return $this->hasMany('App\Models\NagarparishadWardNumber');
    }

    public function area()
    {
        return $this->morphOne(User::class, 'areable');
    }
}
