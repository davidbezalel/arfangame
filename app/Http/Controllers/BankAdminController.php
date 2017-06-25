<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\User;
use App\Model\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankAdminController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            if ($this->isPost()) {
                $bankmodel = new Bank();
                $columns = ['no', 'bank', 'name', 'accountno'];

                $where = array(
                    ['name', 'LIKE', '%' . $request['search']['value'] . '%'],
                    ['bank', 'LIKE', '%' . $request['search']['value'] . '%', 'OR']
                );
                $banks = $bankmodel->find_v2($where, true, ['*'], intval($request['length']), intval($request['start']), $columns[intval($request['order'][0]['column'])], $request['order'][0]['dir']);
                $number = intval($request['start']) + 1;
                foreach ($banks as &$item) {
                    $item['no'] = $number;
                    $number++;
                }
                $response_json = array();
                $response_json['draw'] = $request['draw'];
                $response_json['data'] = $banks;
                $response_json['recordsTotal'] = $bankmodel->getTableCount($where);
                $response_json['recordsFiltered'] = $bankmodel->getTableCount($where);
                return $this->__json($response_json);
            }
            $styles = array();
            $scripts = array();
            $scripts[] = 'bank.js';
            $this->data['styles'] = $styles;
            $this->data['scripts'] = $scripts;
            $this->data['controller'] = 'bank';
            $this->data['title'] = 'Bank';
            return view('admin.bank.index')->with('data', $this->data);
        }
        return redirect('/admin/login');
    }

    public function all() {
        if (Auth::check() || Auth::guard('user')->check()) {
            if ($this->isPost()) {
                $banks = Bank::all();
                $this->response_json->status = true;
                $this->response_json->data = $banks;
                return $this->__json();
            }
        }
        return redirect('/admin/login');
    }

    public function add(Request $request)
    {
        if (Auth::check()) {
            if ($this->isPost()) {
                /* set validation rules */
                $rules = array(
                    'bank' => 'required',
                    'name' => 'required',
                    'accountno' => 'required',
                );

                /* checking validation error */
                if (null !== $this->validate_v2($request, $rules)) {
                    $this->response_json->message = $this->validate_v2($request, $rules);
                    return $this->__json();
                }

                /* insert data */
                $data = [];
                $bankmodel = new Bank();
                foreach ($bankmodel->getFillable() as $field) {
                    $data[$field] = $request[$field];
                }
                Bank::create($data);
                $this->response_json->status = true;
                $this->response_json->message = 'Bank Added.';
                return $this->__json();
            }
        }
        return redirect('/admin/login');
    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            if ($this->isPost()) {
                /* set validation rules */
                $rules = array(
                    'bank' => 'required',
                    'name' => 'required',
                    'accountno' => 'required',
                );

                /* checking validation error */
                if (null !== $this->validate_v2($request, $rules)) {
                    $this->response_json->message = $this->validate_V2($request, $rules);
                    return $this->__json();
                }

                /* update data */
                $where = [
                    ['id', '=', $request['id']]
                ];
                $data = [];
                $bankmodel = new Bank();
                $bank = Bank::find($request['id']);
                foreach ($bankmodel->getFillable() as $field) {
                    $data[$field] = $request[$field];
                }
                if ($bank->update_v2($where, $data)) {
                    $this->response_json->status = true;
                    $this->response_json->message = 'Bank Updated.';
                }
                return $this->__json();
            }
        }
        return redirect('/admin/login');
    }

    public function delete(Request $request)
    {
        if (Auth::check()) {
            if ($this->isPost()) {
                $id = $request['id'];
                $bankmodel = new Bank();
                $bank = $bankmodel->find($id);
                $bank->delete();
                $this->response_json->status = true;
                $this->response_json->message = 'Bank Deleted.';
                return $this->__json();
            }
        }
        return redirect('/admin/login');
    }
}
