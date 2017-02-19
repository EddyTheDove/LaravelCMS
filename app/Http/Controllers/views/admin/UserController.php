<?php

namespace App\Http\Controllers\views\admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit');
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
        //
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
