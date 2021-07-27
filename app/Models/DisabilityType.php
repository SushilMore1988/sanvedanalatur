<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisabilityType extends Model
{
    use HasFactory;

    /**
     * The roles that belong to the user.
     */
    protected $fillable = [
        'type',
    ];
    
    public function divyangs()
    {
        return $this->belongsToMany(Divyang::class);
    }
}
