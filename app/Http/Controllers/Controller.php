<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    public function viewLogin()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Langsung jalankan query untuk admin
        // $admin = DB::table('admin')->where('username', $request->username)->first();

        if ($request->username !== 'admin') {
            return view('login')->with(['fail'=> 'Admin not found']);
        }

        if ($request->password !== 'admin' ) {
            return view('login')->with(['fail'=> 'Wrong Password']);
        }

        // session(['user' => $admin]);

        return redirect('/jual');
    }
}
