<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Model\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TransactionPlayerController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
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
}
