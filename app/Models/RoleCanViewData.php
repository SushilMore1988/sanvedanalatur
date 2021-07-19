<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleCanViewData extends Model
{
    use HasFactory;

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    public function viewRole()
    {
        return $this->belongsTo('App\Models\Role', 'view_role_id');
    }
}
