<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Model\DepositTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DepositPlayerController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guard('user')->check()) {
            if ($this->isPost()) {
                $deposittransactionmodel = new DepositTransaction();
                $columns = ['updated_at', 'ammount', 'type', 'transactiondescription', 'created_at'];
                $where = [
                    ['sourceid', '=', Auth::guard('user')->user()->id],
                    ['destinationid', '=', Auth::guard('user')->user()->id, 'OR']
                ];
                $deposittransactions = $deposittransactionmodel->find_v2($where, true, ['*'], intval($request['length']), intval($request['start']), $columns[intval($request['order'][0]['column'])], $request['order'][0]['dir']);
                $number = intval($request['start']) + 1;
                foreach ($deposittransactions as &$item) {
                    /* make transaction description */
                    if ($item['type'] == DepositTransaction::TYPE_DEPOSIT_CHARGE) {
                        $item['transactiondescription'] = 'Deposit Charge';
                    } else if ($item['type'] == DepositTransaction::TYPE_CASH_WITHDRAWAL) {
                        $item['transactiondescription'] = 'Cash Withdrawal';
                    }

                    /* make type: D or K */
                    if ($item['destinationid'] == Auth::guard('user')->user()->id) {
                        $item['type'] = 'D';
                    } else {
                        $item['type'] = 'K';
                    }
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
            $this->data['controller'] = 'deposit';
            return view('player.deposit.index')->with('data', $this->data);
        }
        return redirect('/');
    }
}
