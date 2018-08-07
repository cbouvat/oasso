<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleType extends Model
{

    /** RELATIONS */

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
