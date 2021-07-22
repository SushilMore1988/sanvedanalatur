<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * The roles that belong to the user.
     */
    protected $table="countries";
    protected $fillable = [
        'name',
    ];

    public function states()
    {
        return $this->hasMany('App\Models\State');
    }

    public function area()
    {
        return $this->morphOne(User::class, 'areable');
    }
}
