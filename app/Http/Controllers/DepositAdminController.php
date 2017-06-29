<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Player;
use Illuminate\Http\Request;
use App\Model\DepositTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DepositAdminController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            if ($this->isPost()) {
                $deposittransactionmodel = new DepositTransaction();
                $columns = ['updated_at', 'ammount', 'type', 'transactiondescription', 'created_at'];
                $where = [];
                $deposittransactions = $deposittransactionmodel->find_v2($where, true, ['*'], intval($request['length']), intval($request['start']), $columns[intval($request['order'][0]['column'])], $request['order'][0]['dir']);
                $number = intval($request['start']) + 1;
                foreach ($deposittransactions as &$item) {
                    /* make transaction description */
                    if ($item['type'] == DepositTransaction::TYPE_DEPOSIT_CHARGE) {
                        $item['transactiondescription'] = 'Deposit Charge';
                        $item['type'] = 'D';
                    } else if ($item['type'] == DepositTransaction::TYPE_CASH_WITHDRAWAL) {
                        $item['transactiondescription'] = 'Cash Withdrawal';
                        $item['type'] = 'K';
                    }

                    /* get player data */
                    if ($item['sourceid'] != 0) {
                        $player = Player::find($item['sourceid']);
                    } else {
                        $player = Player::find($item['destinationid']);
                    }
                    $item['player'] = $player;

                    $item['no'] = $number;
                    $number++;
                }
                $response_json = array();
                $response_json['draw'] = $request['draw'];
                $response_json['data'] = $deposittransactions;
                $response_json['recordsTotal'] = $deposittransactionmodel->getTableCount([]);
                $response_json['recordsFiltered'] = $deposittransactionmodel->getTableCount([]);
                return $this->__json($response_json);
            }
            $styles = array();
            $scripts = array();
            $scripts[] = 'deposit.js';
            $this->data['styles'] = $styles;
            $this->data['scripts'] = $scripts;
            $this->data['title'] = 'Deposit';
            $this->data['controller'] = 'transaction';
            $this->data['function'] = 'deposit';
            return view('admin.deposit.index')->with('data', $this->data);
        }
        return redirect('/');
    }
}
