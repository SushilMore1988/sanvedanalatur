<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressProof extends Model
{
    use HasFactory;

    protected $addresses, $name, $address;

    protected $fillable = [
        'name',
    ];
}
