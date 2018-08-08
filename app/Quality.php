<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quality_type_id','user_id'];

    /** RELATIONS */

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
