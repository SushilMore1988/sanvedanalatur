<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    public function taluka()
    {
        return $this->belongsTo('App\Models\Taluka');
    }
}
