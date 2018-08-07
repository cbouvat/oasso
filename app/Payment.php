<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    /** RELATIONS */

    public function paymentMethod()
    {
        return $this->belongsTo('App\PaymentMethod');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
