<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahanagarpalikaWardNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'zone_id', 'mahanagarpalika_id'
    ];

    // public function mahanagarpalika()
    // {
    //     return $this->belongsTo('App\Models\Mahanagarpalika');
    // }

    public function zone()
    {
        return $this->belongsTo('App\Models\Zone');
    }

    public function area()
    {
        return $this->morphOne(User::class, 'areable');
    }
}
