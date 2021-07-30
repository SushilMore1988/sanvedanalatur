<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MartialStatus extends Model
{
    use HasFactory;
    protected $table="martial_statuses";
    protected $fillable = [
        'type',
    ];
    public function MartialStatus()
    {
        return $this->belongsTo('App\Models\MartialStatus');
    }
}
