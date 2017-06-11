<?php

namespace App\Model;

use App\Helper\Model;

class User extends Model
{
    const ASSETS = 'user/';

    protected $table = 'user';
    protected $hidden = ['password', 'remember_token'];
    protected $fillable = ['name', 'userid', 'password'];
}
