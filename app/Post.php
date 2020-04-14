<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table ="posts";
    protected $fillable = ['id','title','disc','user_name','category_name','created_at','updated_at','image_post'];
}
