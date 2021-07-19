<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NagarparishadWardNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'nagarparishad_id'
    ];
    
    public function nagarparishad()
    {
        return $this->belongsTo('App\Models\Nagarparishad');
    }

    public function area()
    {
        return $this->morphOne(User::class, 'areable');
    }
}
