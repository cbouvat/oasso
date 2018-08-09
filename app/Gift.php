<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function payment()
    {
        return $this->morphOne('App\Payment', 'payment');
    }
}
