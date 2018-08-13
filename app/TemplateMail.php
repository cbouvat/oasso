<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateMail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','html_content','text_content'
    ];
}
