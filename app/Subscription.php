<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    /** RELATIONS */

    public function subscriptionType()
    {
        return $this->belongsTo('App\SubscriptionType');
    }

    public function payments() {
        return $this->morphMany('App\Payment', 'paymentable');
    }
}
