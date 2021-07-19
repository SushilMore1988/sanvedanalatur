<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divyang extends Model
{
    use HasFactory;

    /**
     * The roles that belong to the user.
     */
    public function disabilityTypes()
    {
        return $this->belongsToMany(DisabilityType::class);
    }

    /**
     * The roles that belong to the user.
     */
    public function disabilityTypeDivyang()
    {
        return $this->hasMany(DisabilityTypeDivyang::class);
    }

    public function disabilityAreas()
    {
        return $this->belongsToMany(DisabilityArea::class);
    }
}
