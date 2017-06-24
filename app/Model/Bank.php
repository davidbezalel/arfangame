<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Bank extends Authenticatable
{
    const ASSETS = 'bank/';

    protected $table = 'bank';
    protected $fillable = ['bank', 'name', 'accountno'];
}
