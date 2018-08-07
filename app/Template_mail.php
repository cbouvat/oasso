<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template_mail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','type','html_content','text_content'];
}
