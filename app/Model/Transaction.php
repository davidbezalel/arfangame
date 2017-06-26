<?php

namespace App\Model;

use App\Helper\Model;

class Transaction extends Model
{
    const ASSETS = 'transaction/';
    const STATUS_CLAIMED = 0;
    const STATUS_VALID = 1;
    const STATUS_INVALID = 2;


    protected $table = 'transaction';
    protected $fillable = ['player_id', 'adminbankid', 'playerbank', 'playeraccountno', 'playeraccountname', 'ammount', 'date', 'status', 'type'];
}
