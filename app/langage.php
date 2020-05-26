<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class langage extends Model
{
    public $table ="langages";
    protected $fillable = ['id','lang'];
}
