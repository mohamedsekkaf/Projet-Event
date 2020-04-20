<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compte_Post extends Model
{
    public $table ="compte__posts";
    protected $fillable = ['id','compte_post'];
}
