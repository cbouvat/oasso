<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    /** RELATIONS */

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
