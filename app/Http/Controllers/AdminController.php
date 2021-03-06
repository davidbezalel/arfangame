<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Player;
use App\Model\Transaction;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if ($this->isPost()) {
            /* get admin data */
        }
        $styles = array();
        $scripts = array();
        $this->data['styles'] = $styles;
        $this->data['scripts'] = $scripts;
        $this->data['controller'] = 'dashboard';
        $this->data['title'] = 'Dashboard';
        return view('admin.index')->with('data', $this->data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function login(Request $request)
    {
        if ($this->isPost()) {
            /* set validation rules */
            $rules = array(
                'adminid' => 'required',
                'password' => 'required|min:6',
            );

            /* checking validation error */
            if (null !== $this->validate_v2($request, $rules)) {
                $this->response_json->message = $this->validate_V2($request, $rules);
                return $this->__json();
            }

            /* get request data */
            $data = $request->all();

            if (Auth::guard('admin')->attempt($data)) {
                $this->response_json->status = true;
            } else {
                $this->response_json->message = 'Check your credentials. Email or password might be wrong.';
            }
            return $this->__json();

        }
        $styles = array();
        $styles[] = 'style.css';
        $styles[] = 'auth.css';

        $scripts = array();
        $scripts[] = 'auth.js';

        $this->data['title'] = 'ArfanGame | Login';
        $this->data['styles'] = $styles;
        $this->data['scripts'] = $scripts;

        return view('admin.login')->with('data', $this->data);
    }

    public function register(Request $request)
    {
        if ($this->isPost()) {
            /* set validation rules */
            $rules = array(
                'name' => 'required',
                'adminid' => 'required',
                'password' => 'required|min:6',
                'repassword' => 'required|min:6|same:password',
            );

            /* checking validation error */
            if (null !== $this->validate_v2($request, $rules)) {
                $this->response_json->message = $this->validate_V2($request, $rules);
                return $this->__json();
            }

            /* checking the userid */
            $adminmodel = new User();
            $where = array(
                'userid' => $request['userid']
            );
            if (null !== $adminmodel->find_v2($where)) {
                $this->response_json->message = 'userid already exist.';
                return $this->__json();
            }

            /* insert: user */
            $data = array();
            foreach ($adminmodel->getFillable() as $field) {
                if ($field == 'password') {
                    $data['password'] = Hash::make($request['password']);
                } else {
                    $data[$field] = $request[$field];
                }
            }
            User::create($data);

            $this->response_json->status = true;

            return $this->__json();
        }
        $styles = array();
        $styles[] = 'style.css';
        $styles[] = 'auth.css';

        $scripts = array();
        $scripts[] = 'auth.js';

        $this->data['title'] = 'ArfanGame | Register';
        $this->data['styles'] = $styles;
        $this->data['scripts'] = $scripts;
        return view('admin.register')->with('data', $this->data);
    }

    public function transactionnotification()
    {
        if ($this->isPost()) {
            $transactionmodel = new Transaction();
            $where = [
                ['status', '=', Transaction::STATUS_CLAIMED],
                ['status', '=', Transaction::STATUS_REQUESTED, 'OR']
            ];

            $join = [
                ['player', 'player.id', '=', 'transaction.player_id']
            ];

            $transactions = $transactionmodel->find_v2($where, true, ['transaction.*', 'player.name'], 0, 0, 'transaction.date', 'DESC', $join);
            $this->response_json->status = true;
            $this->response_json->data = $transactions;
            return $this->__json();
        }
    }
}
