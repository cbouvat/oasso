<?php
/**
 * Created by PhpStorm.
 * User: remi
 * Date: 06/08/18
 * Time: 16:13
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleType extends Model
{

    /** RELATIONS */

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
