<?php

namespace App\Http\Controllers\Halaman;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Lelang;
use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPetugas = Petugas::orderBy('id_petugas','desc')->get();
        $dataMasyarakat = Masyarakat::orderBy('id_user','desc')->get();
        $dataBarang = Barang::orderBy('id_barang','desc')->get();
        $data = Lelang::with('barang','masyarakat','petugas')->orderBy('id_lelang','desc')->get();
        return view('Halaman.Lelang.index',compact('data','dataBarang','dataMasyarakat','dataPetugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Session::flash('id_barang',$request->id_barang);
       Session::flash('tgl_lelang',$request->tgl_lelang);
       Session::flash('harga_akhir',$request->harga_akhir);
       Session::flash('id_user',$request->id_user);
       Session::flash('id_petugas',$request->id_petugas);
       Session::flash('status',$request->status);

       $request->validate([
        'id_barang' => 'required',
        'tgl_lelang' => 'required',
        'harga_akhir' => 'required',
        'id_user' => 'required',
        'id_petugas' => 'required',
        'status' => 'required',
       ],[
        'id_barang.required' => ' Barang Harus di isi',
        'tgl_lelang.required' => ' Tanggal Lelang Harus di isi',
        'harga_akhir.required' => ' Harga Akhir Harus di isi',
        'id_user.required' => ' User atau masyarakat Harus di isi',
        'id_petugas.required' => 'Petugas Harus di isi',
        'status.required' => 'Status Harus di isi',
       ]);

       Lelang::create($request->all());
       return back()->with('success','Data Barang Lelanng berhasil disimpann');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_lelang)
    {
        Session::flash('id_barang',$request->id_barang);
        Session::flash('tgl_lelang',$request->tgl_lelang);
        Session::flash('harga_akhir',$request->harga_akhir);
        Session::flash('id_user',$request->id_user);
        Session::flash('id_petugas',$request->id_petugas);
        Session::flash('status',$request->status);
 
        $request->validate([
         'id_barang' => 'required',
         'tgl_lelang' => 'required',
         'harga_akhir' => 'required',
         'id_user' => 'required',
         'id_petugas' => 'required',
         'status' => 'required',
        ],[
         'id_barang.required' => ' Barang Harus di isi',
         'tgl_lelang.required' => ' Tanggal Lelang Harus di isi',
         'harga_akhir.required' => ' Harga Akhir Harus di isi',
         'id_user.required' => ' User atau masyarakat Harus di isi',
         'id_petugas.required' => 'Petugas Harus di isi',
         'status.required' => 'Status Harus di isi',
        ]);

        $data = [
            'id_barang'=> $request->id_barang,
            'tgl_lelang'=> $request->tgl_lelang,
            'harga_akhir'=> $request->harga_akhir,
            'id_user'=> $request->id_user,
            'id_petugas'=> $request->id_petugas,
            'status'=> $request->status,
        ];
 
        Lelang::where('id_lelang',$id_lelang)->update($data);
        return back()->with('success','Data Barang Lelanng berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_lelang)
    {
        Lelang::find($id_lelang)->delete();
        return back()->with('success','Data Berhasil di hapus');
    }
}
