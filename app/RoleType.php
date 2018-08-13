<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', ];

    /** RELATIONS */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
