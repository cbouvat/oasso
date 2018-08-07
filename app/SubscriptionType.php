<?php
/**
 * Created by PhpStorm.
 * User: remi
 * Date: 06/08/18
 * Time: 16:18
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionType extends Model
{

    /** RELATIONS */

    public function subscription()
    {
        return $this->belongsTo('App\Subscription');
    }
}