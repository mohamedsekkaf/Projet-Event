<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public $table ="followers";
    protected $fillable = ['id','user_follow','follow','slug_follow','slug_plus_user','created_at','updated_at'];
}