<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Player extends Authenticatable
{
    const ASSETS = 'player/';

    protected $table = 'player';
    protected $hidden = ['password', 'remember_token'];
    protected $fillable = ['name', 'playerid', 'password'];
}
