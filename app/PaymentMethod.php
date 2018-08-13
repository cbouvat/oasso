<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'];

    /** RELATIONS */

    public function payment()
    {
        return $this->hasMany('App\Payment');
    }
}
