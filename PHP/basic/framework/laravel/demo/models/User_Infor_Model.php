<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Infor_Model extends Model
{
    protected $table = 'user_infor';
    protected $fillable = ['id', 'name', 'password'];
    //public $timestamps  = false;
}
