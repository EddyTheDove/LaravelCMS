<?php

namespace App\Http\Controllers\views\admin;

use Hash;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role = null;
        if ( $request->has('role') && $request->role != '' ) {
            $role = Role::where('name', $request->role)->first();
        }

        $keywords = $request->keywords;
        $users = User::when($keywords, function($query) use ($keywords) {
            return $query->where('firstname', 'rlike', $keywords)
            ->orWhere('lastname', 'rlike', $keywords)
            ->orWhere('username', 'rlike', $keywords);
        })
        ->when($role, function($query) use ($role) {
            return $query->where('role_id', $role->id);
        })
        ->orderBy('id', 'desc')
        ->paginate(50);

        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'  => 'required',
            'firstname'  => 'required',
            'username'  => 'required'
        ]);


        if($validator->fails())
            return redirect()->back()->withErrors(['validator' => 'Email, first name & username are required!']);

        if ( preg_match('/\s/', $request->username) ) {
            return redirect()->back()->withErrors(['validator' => 'Username cannot contain white spaces']);
        }

        $lastUser = User::orderBy('id', 'desc')->first();
        $number = $lastUser->number + rand(2, 9);

        $user = User::create([
            'email' => $request->email,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'role_id' => $request->role_id,
            'is_active' => $request->is_active,
            'password' => Hash::make($request->password),
            'number'  => $number,
            'api_token' => str_random(128)
        ]);

        return redirect()->route('users.edit', $user->username)->with('message', 'User successfully added');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if ( !$user  ) {
            return redirect()->route('users.index');
        }

        $roles = Role::get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
             'email'  => 'required',
             'firstname'  => 'required',
             'username'  => 'required'
         ]);


         if($validator->fails())
             return redirect()->back()->withErrors(['validator' => 'Email, first name & username are required!']);


         $user = User::find($id);
         if ( !$user ) {
             return redirect()->back()->withErrors(['user' => 'Unknown user!']);
         }

         if ( preg_match('/\s/', $request->username) ) {
             return redirect()->back()->withErrors(['validator' => 'Username cannot contain white spaces']);
         }

         $user->email          = $request->has('email') ? $request->email : $user->email;
         $user->firstname      = $request->has('firstname') ? $request->firstname : $user->firstname;
         $user->lastname       = $request->has('lastname') ? $request->lastname : $user->lastname;
         $user->username       = $request->has('username') ? $request->username : $user->username;
         $user->role_id        = $request->has('role_id') ? $request->role_id : $user->role_id;
         $user->is_active      = $request->has('is_active') ? $request->is_active : $user->is_active;
         $user->save();

         return redirect()->back()->with('message', 'User successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
