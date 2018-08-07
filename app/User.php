<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];



    /** RELATIONS */

    public function newsletters()
    {
        return $this->hasMany('App\Newsletter');
    }

    public function gifts()
    {
        return $this->hasMany('App\Gift');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function quality()
    {
        return $this->belongsTo('App\Quality');
    }

    public function subscription() {
        return $this->hasOne('App\Subscription');
    }

}
