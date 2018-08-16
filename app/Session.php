<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
