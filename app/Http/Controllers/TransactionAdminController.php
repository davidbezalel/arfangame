<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\DepositTransaction;
use App\Model\Transaction;
use Illuminate\Http\Request;
use App\Model\Player;
use App\Model\Bank;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TransactionAdminController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            if ($this->isPost()) {
                $transactionmodel = new Transaction();
                $columns = ['updated_at', 'player.name', 'adminbankid', 'playerbank', 'playeraccountname', 'playeraccountname', 'ammount', 'date', 'status'];

                $where = array(
                    ['playerbank', 'LIKE', '%' . $request['search']['value'] . '%'],
                    ['playeraccountno', 'LIKE', '%' . $request['search']['value'] . '%', 'OR'],
                    ['playeraccountname', 'LIKE', '%' . $request['search']['value'] . '%', 'OR'],
                    ['player.name', 'LIKE', '%' . $request['search']['value'] . '%', 'OR'],
                    ['admin.name', 'LIKE', '%' . $request['search']['value'] . '%', 'OR']
                );

                $join = [
                    ['bank', 'bank.id', '=', 'transaction.adminbankid', 'left'],
                    ['player', 'player.id', '=', 'transaction.player_id'],
                    ['admin', 'admin.id', '=', 'transaction.handledby', 'left']
                ];

                $transactions = $transactionmodel->find_v2($where, true, ['transaction.*', 'admin.name as adminname', 'player.name as playername', 'bank.bank'], intval($request['length']), intval($request['start']), $columns[intval($request['order'][0]['column'])], $request['order'][0]['dir'], $join);
                $number = intval($request['start']) + 1;
                foreach ($transactions as &$item) {
                    $item['no'] = $number;
                    $number++;
                }
                $response_json = array();
                $response_json['draw'] = $request['draw'];
                $response_json['data'] = $transactions;
                $response_json['recordsTotal'] = $transactionmodel->getTableCount($where, $join);
                $response_json['recordsFiltered'] = $transactionmodel->getTableCount($where, $join);
                return $this->__json($response_json);
            }
            $styles = array();
            $scripts = array();
            $scripts[] = 'transaction.js';
            $this->data['styles'] = $styles;
            $this->data['scripts'] = $scripts;
            $this->data['title'] = 'Transaction';
            $this->data['controller'] = 'transaction';
            $this->data['function'] = 'transfer';
            return view('admin.transaction.index')->with('data', $this->data);
        }
        return redirect('/admin/login');
    }

    public function detail($id)
    {
        if (Auth::check()) {
            if ($this->isPost()) {
            }
            $transaction = Transaction::find($id);
            if ($transaction) {
                $transaction['user'] = Player::find($transaction['player_id']);
                $transaction['adminbank'] = Bank::find($transaction['adminbankid']);
                $styles = array();
                $scripts = array();
                $scripts[] = 'transaction.js';
                $this->data['styles'] = $styles;
                $this->data['scripts'] = $scripts;
                $this->data['title'] = 'Transaction';
                $this->data['controller'] = 'transaction';
                $this->data['data'] = $transaction;
                return view('admin.transaction.detail')->with('data', $this->data);
            }
            return redirect('/admin/transaction');
        }
        return redirect('/admin/login');
    }

    public function valid($id){
        if (Auth::check()) {
            if ($this->isPost()) {
                DB::beginTransaction();
                try {
                    $transaction = Transaction::find($id);
                    $player = Player::find($transaction['player_id']);

                    /* update transaction */
                    $transaction->status = Transaction::STATUS_VALID;
                    $transaction->handledby = Auth::user()->id;
                    $transaction->save();

                    /* update user */
                    $player->deposit += $transaction['ammount'];
                    $player->save();

                    /* insert deposite transaction */
                    $data = [];
                    $data['sourceid'] = 0;
                    $data['destinationid'] = $transaction['player_id'];
                    $data['type'] = DepositTransaction::TYPE_DEPOSIT_CHARGE;
                    $data['referenceid'] = $transaction['id'];
                    $data['ammount'] = $transaction['ammount'];
                    DepositTransaction::create($data);

                    DB::commit();

                    $this->response_json->status = true;
                    $this->response_json->message = 'Transaction Valid.';
                    return $this->__json();
                } catch (\Exception $e) {
                    DB::rollback();
                }
            }
        }
        return redirect('/admin/login');
    }

    public function invalid($id){
        if (Auth::check()) {
            if ($this->isPost()) {
                $transaction = Transaction::find($id);
                $transaction->status = Transaction::STATUS_INVALID;
                $transaction->handledby = Auth::user()->id;
                $transaction->save();

                $this->response_json->status = true;
                $this->response_json->message = 'Transaction Invalid.';
                return $this->__json();
            }
        }
        return redirect('/admin/login');
    }

    public function sent($id, Request $request){
        if (Auth::check()) {
            if ($this->isPost()) {
                /* validation */
                if ($request['adminbankid'] == 0) {
                    $this->response_json->message = 'Please choose Admin Bank account.';
                    return $this->__json();
                }
                $rules = [
                    'date' => 'required'
                ];

                if (null !== $this->validate_v2($request, $rules)) {
                    $this->response_json->message = $this->validate_v2($request, $rules);
                    return $this->__json();
                }

                DB::beginTransaction();
                try {
                    /* update transaction */
                    $transaction = Transaction::find($id);
                    $transaction->status = Transaction::STATUS_SENT;
                    $transaction->handledby = Auth::user()->id;
                    $transaction->adminbankid = $request['adminbankid'];
                    $transaction->date = $request['date'];
                    $transaction->save();

                    /* update user */
                    $player = Player::find($transaction['player_id']);
                    $player->deposit -= $transaction['ammount'];
                    $player->save();

                    /* insert deposite transaction */
                    $data = [];
                    $data['sourceid'] = $transaction['player_id'];
                    $data['destinationid'] = 0;
                    $data['type'] = DepositTransaction::TYPE_CASH_WITHDRAWAL;
                    $data['referenceid'] = $transaction['id'];
                    $data['ammount'] = $transaction['ammount'];
                    DepositTransaction::create($data);

                    DB::commit();

                    $this->response_json->status = true;
                    $this->response_json->message = 'Transaction Sent.';
                    return $this->__json();

                } catch(\Exception $e) {
                    DB::rollback();
                }
            }
        }
        return redirect('/admin/login');
    }
}
