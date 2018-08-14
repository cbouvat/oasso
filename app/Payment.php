<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_type', 'payment_id', 'amount', 'user_id', 'payment_method_id', ];

    /** RELATIONS */
    public function paymentMethod()
    {
        return $this->belongsTo('App\PaymentMethod');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function payment()
    {
        return $this->morphTo();
    }
}
