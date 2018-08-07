<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /** RELATIONS */

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function roleType()
    {
        return $this->belongsTo('App\RoleType');
    }
}
