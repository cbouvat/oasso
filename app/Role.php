<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'role_type_id', ];

    /** RELATIONS */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function roleType()
    {
        return $this->belongsTo('App\RoleType');
    }
}
