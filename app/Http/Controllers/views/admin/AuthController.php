<?php

namespace App\Http\Controllers\views\admin;

use Auth;
use Hash;
use Mail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class AuthController extends Controller
{
    use ThrottlesLogins;

    public function login() {
        return view('admin.auth.login');
    }

    /**
     * User sign out
     * @return [type] [description]
     */
    public function logout() {
        if(Auth::check())
            Auth::logout();
        return redirect()->back();
    }


    /**
     * User sign in
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password'  => 'required',
            'email' 	=> 'required'
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors(['validator' => 'All fields are required']);

        $user = User::where('email', $request->email)->first();

        if ( !$user )
        return redirect()->back()->withErrors([
            "user"   => "Account not found"
        ])->withInput($request->except('password'));

        if ( !$user->is_active ) {
            return redirect()->back()->withErrors([
                "user"   => "This account is not activated"
            ])->withInput($request->except('password'));
        }


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true])) {
            return redirect()->intended('/admin');
        }

        return redirect()->back()->withErrors([
            "message"   => "Please check your credentials"
        ])->withInput($request->except('password'));
    }



}
