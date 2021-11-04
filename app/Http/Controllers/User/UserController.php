<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class UserController extends Controller
{
    public function logout() {
        Auth::logout();

        return redirect()->route('login');
    }
}
