<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentityProof extends Model
{
    use HasFactory;

    protected $identities, $name, $identity;

    protected $fillable = [
        'name',
    ];
}
