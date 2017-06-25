<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Transaction;
use Illuminate\Http\Request;
use App\Model\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TransactionAdminController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            if ($this->isPost()) {
                $transactionmodel = new Transaction();
                $columns = ['no', 'adminbankid', 'playerbank', 'playeraccountname', 'playeraccountname', 'ammount', 'date', 'status'];

                $where = array(
                    ['playerbank', 'LIKE', '%' . $request['search']['value'] . '%', 'AND'],
                    ['playeraccountno', 'LIKE', '%' . $request['search']['value'] . '%', 'OR'],
                    ['playeraccountname', 'LIKE', '%' . $request['search']['value'] . '%', 'OR'],
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
            return view('admin.transaction.index')->with('data', $this->data);
        }
        return redirect('/admin/login');
    }
}
