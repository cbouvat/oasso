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
        'zipcode', 'city', 'email', 'gender_joint', 'lastname_joint', 'firstname_joint', 'birthdate_joint', 'email_joint', 'phone_number_1',
        'phone_number_2', 'volonteer', 'details_volonteer', 'delivery', 'newspaper', 'newsletter', 'mailing', 'comment', 'alert',
    ];

    /**
     * Set the user's first name.
     * @param  string $value
     * @return void
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['firstname'] = ucfirst(strtolower($value));
    }

    /**
     * Set the user's last name.
     * @param  string $value
     * @return void
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['lastname'] = strtoupper($value);
    }

    /**
     * Set the users city.
     * @param $value
     * @return void
     */
    public function setCityAttribute($value)
    {
        $this->attributes['city'] = ucfirst(strtolower($value));
    }

    /**
     * Set the user joint first name.
     * @param  string $value
     * @return void
     */
    public function setFirstNameJointAttribute($value)
    {
        $this->attributes['firstname_joint'] = ucfirst(strtolower($value));
    }

    /**
     * Set the user joint last name.
     * @param  string $value
     * @return void
     */
    public function setLastNameJointAttribute($value)
    {
        $this->attributes['lastname_joint'] = strtoupper($value);
    }

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
        return $this->hasMany('App\Payment')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany('App\Subscription')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|\Illuminate\Database\Query\Builder
     */
    public function sessions()
    {
        return $this->hasMany('App\Session')->latest();
    }
}
