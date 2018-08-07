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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','amount'];

    /** RELATIONS */

    public function subscription()
    {
        return $this->belongsTo('App\Subscription');
    }
}
