<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Transaction;
use Illuminate\Http\Request;
use App\Model\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TransactionPlayerController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guard('user')->check()) {
            if ($this->isPost()) {
                $transactionmodel = new Transaction();
                $columns = ['no', 'adminbankid', 'playerbank', 'playeraccountname', 'playeraccountname', 'ammount', 'date', 'status'];
                $where = array(
                    ['player_id', '=', Auth::guard('user')->user()->id],
                    ['playerbank', 'LIKE', '%' . $request['search']['value'] . '%', 'AND ('],
                    ['playeraccountno', 'LIKE', '%' . $request['search']['value'] . '%', 'OR'],
                    ['playeraccountname', 'LIKE', '%' . $request['search']['value'] . '%', 'OR'],
                    ['transaction.id', '>', 0, ') AND']
                );

                $join = [
                    ['bank', 'bank.id', '=', 'transaction.adminbankid']
                ];

                $banks = $transactionmodel->find_v2($where, true, ['*'], intval($request['length']), intval($request['start']), $columns[intval($request['order'][0]['column'])], $request['order'][0]['dir'], $join);
                $number = intval($request['start']) + 1;
                foreach ($banks as &$item) {
                    $item['no'] = $number;
                    $number++;
                }
                $response_json = array();
                $response_json['draw'] = $request['draw'];
                $response_json['data'] = $banks;
                $response_json['recordsTotal'] = $transactionmodel->getTableCount($where);
                $response_json['recordsFiltered'] = $transactionmodel->getTableCount($where);
                return $this->__json($response_json);
            }
            $styles = array();
            $scripts = array();
            $scripts[] = 'transaction.js';
            $this->data['styles'] = $styles;
            $this->data['scripts'] = $scripts;
            $this->data['title'] = 'Transaction';
            $this->data['controller'] = 'transaction';
            return view('player.transaction.index')->with('data', $this->data);
        }
        return redirect('/');
    }

    public function claim(Request $request)
    {
        if (Auth::guard('user')->check()) {
            if ($this->isPost()) {
                /* validation */
                if ($request['adminbankid'] == 0) {
                    $this->response_json->message = 'Please choose Admin Bank account.';
                    return $this->__json();
                }
                $rules = [
                    'playerbank' => 'required',
                    'playeraccountno' => 'required',
                    'playeraccountname' => 'required',
                    'ammount' => 'required',
                    'date' => 'required'
                ];


                if (null !== $this->validate_v2($request, $rules)) {
                    $this->response_json->message = $this->validate_v2($request, $rules);
                    return $this->__json();
                }

                /* insert */
                $data = $request->all();
                $data['player_id'] = Auth::guard('user')->user()->id;
                $data['status'] = Transaction::STATUS_CLAIMED;
                $data['type'] = 'D';

                if (Transaction::create($data)) {
                    $this->response_json->status = true;
                    $this->response_json->message = 'Your payment claimed.';
                }

                return $this->__json();
            }
        }
        return redirect('/');
    }

}
