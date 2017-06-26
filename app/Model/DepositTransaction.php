<?php

namespace App\Model;

use App\Helper\Model;

class DepositTransaction extends Model
{
    const ASSETS = 'deposittransaction/';
    const TYPE_GAME_CHARGE = 0;
    const TYPE_GAME_REWARD = 3;
    const TYPE_DEPOSIT_CHARGE = 1;
    const TYPE_CASH_WITHDRAWAL = 2;

    protected $table = 'deposittransaction';
    protected $fillable = ['sourceid', 'destinationid', 'type', 'referenceid', 'ammount'];
}
