<?php

namespace App\Model;

use App\Helper\Model;

class Game extends Model
{
    const ASSETS = 'game/';

    protected $table = 'game';
    protected $fillable = ['name', 'multiple', 'totaldigits'];
}
