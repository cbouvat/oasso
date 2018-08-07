<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','type','html_content','text_content','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
