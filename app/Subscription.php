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
        'amount','opt_out_mail','user_id','subscription_type_id'];


    /** RELATIONS */

    public function subscriptionType()
    {
        return $this->belongsTo('App\SubscriptionType');
    }

    public function payments() {
        return $this->morphMany('App\Payment', 'paymentable');
    }
}
