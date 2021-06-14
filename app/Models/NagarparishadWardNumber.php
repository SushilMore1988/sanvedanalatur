<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NagarparishadWardNumber extends Model
{
    use HasFactory;

    public function nagarparishad()
    {
        return $this->belongsTo('App\Models\Nagarparishad');
    }
}
