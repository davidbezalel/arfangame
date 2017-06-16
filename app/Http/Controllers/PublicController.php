<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index()
    {
        if (Auth::guard('user')->check()) {
            /* load user data */
        }

        $this->data['title'] = '';
        return view('public.index')->with('data', $this->data);

    }
}
