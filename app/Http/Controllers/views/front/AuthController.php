<?php

namespace App\Http\Controllers\views\front;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login() {}
    public function signin() {}

    public function logout() {
        if ( Auth::check() ) Auth::logout();
        return redirect()->back();
    }
}
