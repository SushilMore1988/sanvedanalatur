<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'mahanagarpalika_id'
    ];

    public function mahanagarpalika()
    {
        return $this->belongsTo('App\Models\Mahanagarpalika');
    }

    public function area()
    {
        return $this->morphOne(User::class, 'areable');
    }
}
