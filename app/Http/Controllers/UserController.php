<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\User;
use App\Model\UserProfile;
use App\Model\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function login() {
        if ($this->$this->isPost()) {
            /* login logic */
        }
        return view('user.login');
    }

}
