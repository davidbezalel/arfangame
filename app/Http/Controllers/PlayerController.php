<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Model\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{
    public function index()
    {
        if (Auth::guard('user')->check()) {
            /* load user data */
        }
        $styles = array();

        $scripts = array();
        $scripts[] = 'auth.js';

        $this->data['styles'] = $styles;
        $this->data['scripts'] = $scripts;
        $this->data['title'] = 'ArfanGame';
        $this->data['function'] = 'index';
        return view('player.index')->with('data', $this->data);

    }

    public function dashboard()
    {
        $this->data['title'] = '| Dashboard';
        return view('public.index')->with('data', $this->data);
    }

    public function login(Request $request)
    {
        if (Auth::guard('user')->check()) {
            /* redirect to dashboard */
        }
        if ($this->isPost()) {
            /* process credentials */
            $rules = array(
                'playerid' => 'required',
                'password' => 'required|min:6'
            );

            /* validation */
            if (null !== $this->validate_v2($request, $rules)) {
                $this->response_json->message = $this->validate_v2($request, $rules);
                return $this->__json();
            }

            /* get request data */
            $data = $request->all();

            /* process */
            if (Auth::guard('user')->attempt($data)) {
                $this->response_json->status = true;
            } else {
                $this->response_json->message = 'Check your credentials. If you have no account, please register first.';
            }
            return $this->__json();
        }
    }

    public function register(Request $request)
    {
        if (Auth::guard('user')->check()) {
            /* redirect to dashboard */
        }
        if ($this->isPost()) {
            /* define rules */
            $rules = array(
                'name' => 'required',
                'playerid' => 'required|min:6',
                'password' => 'required|min:6',
                'repassword' => 'required|same:password',
            );

            /* validation */
            if (null !== $this->validate_v2($request, $rules)) {
                $this->response_json->message = $this->validate_v2($request, $rules);
                return $this->__json();
            }

            /* insert: player */
            $data = $request->all();
            $playermodel = new Player();
            foreach ($playermodel->getFillable() as $field) {
                if ($field == 'password') {
                    $data['password'] = Hash::make($request['password']);
                } else {
                    $data[$field] = $request[$field];
                }
            }
            $playermodel::create($data);
            $this->response_json->status = true;
            $this->response_json->message = 'Register Success. Please Sign In.';
            return $this->__json();
        }
    }

    public function logout() {
        Auth::guard('user')->logout();
        return redirect('/');
    }
}
