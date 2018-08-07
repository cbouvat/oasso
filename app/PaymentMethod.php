<?php
/**
 * Created by PhpStorm.
 * User: remi
 * Date: 06/08/18
 * Time: 16:27
 */
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

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}