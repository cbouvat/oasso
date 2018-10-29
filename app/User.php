<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'lastname', 'firstname', 'birthdate', 'password', 'address_line1', 'address_line2',
        'zipcode', 'city', 'email', 'gender_joint', 'lastname_joint', 'firstname_joint', 'birthdate_joint', 'email_joint', 'phone_1',
        'phone_2', 'volonteer', 'details_volonteer', 'delivery', 'newspaper', 'newsletter', 'mailing', 'comment', 'alert',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsletters()
    {
        return $this->hasMany('App\Newsletter')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gifts()
    {
        return $this->hasMany('App\Gift')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('App\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany('App\Payment')->orderBy('date_start', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany('App\Subscription')->orderBy('date_start', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|\Illuminate\Database\Query\Builder
     */
    public function sessions()
    {
        return $this->hasMany('App\Session')->latest();
    }
}
