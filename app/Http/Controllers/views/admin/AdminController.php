<?php

namespace App\Http\Controllers\views\admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function home()
    {
        $users = DB::table('users')->count();
        $posts = DB::table('posts')->count();
        $comments = DB::table('comments')->count();

        return view('admin.all.dashboard', compact('users', 'posts', 'comments'));
    }




    public function files()
    {
        return view('admin.all.files');
    }
}
