<?php

namespace App\Http\Controllers\Halaman;

use App\Models\Petugas;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DatauserController extends Controller
{
    public function index()
    {
        $dataUser = Masyarakat::orderBy('id_user','desc')->get();
        $dataPetugas = Petugas::with('level')->orderBy('id_petugas','desc')->get();
        return view('Halaman.DataUser.index',compact('dataUser','dataPetugas'));
    }

    public function delete_user($id_user)
    {
        Masyarakat::findorFail($id_user)->delete();
        return back()->with('success','Data user berhasil di hapus');
    }
    public function delete_petugas($id_petugas)
    {
        Petugas::findorFail($id_petugas)->delete();
        return back()->with('success','Data user berhasil di hapus');
    }
}
