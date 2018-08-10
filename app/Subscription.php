<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount', 'opt_out_mail', 'user_id', 'subscription_type_id', 'subscription_date', 'subscription_source',
    ];


    protected $morphClass = 'subscription';

    /** RELATIONS */

    public function subscriptionType()
    {
        return $this->belongsTo('App\SubscriptionType');
    }

    public function payment()
    {
        return $this->morphOne('App\Payment', 'payment');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
