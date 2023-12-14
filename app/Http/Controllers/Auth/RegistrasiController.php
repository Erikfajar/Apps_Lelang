<?php

namespace App\Http\Controllers\Auth;

use App\Models\Petugas;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RegistrasiController extends Controller
{
    public function index()
    {
        
        return view('Auth.registrasi');
    }

    public function registrasi_user(Request $request)
    {
        // dd($request);
        Session::flash('nama_lengkap',$request->nama_lengkap);
        Session::flash('username',$request->username);
        Session::flash('password',$request->password);
        Session::flash('telp',$request->telp);

        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
        ],[
            'nama_lengkap.required' => 'Nama Lengkap harus di isi', 
            'username.required' => 'Username harus di isi', 
            'password.required' => 'Password harus di isi', 
            'telp.required' => 'telp harus di isi', 
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'telp' => $request->telp,
        ];

        Masyarakat::create($data);
        return back()->with('success','Berhasil Registrasi');
    }

    public function registrasi_petugas(Request $request)
    {
        // dd($request);
        Session::flash('nama_petugas',$request->nama_petugas);
        Session::flash('username',$request->username);
        Session::flash('password',$request->password);
        Session::flash('id_level',$request->id_level);

        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_level' => 'required',
        ],[
            'nama_petugas.required' => 'Nama Petugas harus di isi', 
            'username.required' => 'Username harus di isi', 
            'password.required' => 'Password harus di isi', 
            'id_level.required' => 'Level harus di isi', 
        ]);

        $data = [
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'id_level' => $request->id_level,
        ];

        Petugas::create($data);
        return back()->with('success','Berhasil Registrasi');
    }
}
