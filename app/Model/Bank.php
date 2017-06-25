<?php

namespace App\Model;

use App\Helper\Model;

class Bank extends Model
{
    const ASSETS = 'bank/';

    protected $table = 'bank';
    protected $fillable = ['bank', 'name', 'accountno'];
}
