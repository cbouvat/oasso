<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount','opt_out_mail','user_id','subscription_type_id', 'subscription_date', 'subscription_source'];


    protected $morphClass = 'subscription';

    use SoftDeletes;

    /** RELATIONS */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscriptionType()
    {
        return $this->belongsTo('App\SubscriptionType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function payment()
    {
        return $this->morphOne('App\Payment', 'payment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
