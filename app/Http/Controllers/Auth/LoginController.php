<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        // dd($request);
        Session::flash('username', $request->username);
        Session::flash('password', $request->password);

        $validasi = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Username harus di isi',
            'password.required' => 'Password harus di isi'
        ]);
    

        if(Auth::guard('petugas')->attempt($validasi))
        {
            return redirect()->route('home');
        }

        if(Auth::guard('masyarakat')->attempt($validasi))
        {
            return redirect()->route('home');
        }
        return back();
    }

    public function logout()
    {
        if(Auth::guard('petugas')->check())
        {
            Auth::guard('petugas')->logout();
        }elseif(Auth::guard('masyarakat')->check())
        {
            Auth::guard('masyarakat')->logout();
        }
        return redirect('/');

    }
}
