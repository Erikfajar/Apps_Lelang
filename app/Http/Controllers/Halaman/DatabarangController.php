<?php

namespace App\Http\Controllers\Halaman;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DatabarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::orderBy('id_barang','desc')->get();
        return view('Halaman.DataBarang.index',['data'=>$data]);
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
        // dd($request);
        Session::flash('nama_barang',$request->nama_barang);
        Session::flash('tgl',$request->tgl);
        Session::flash('harga_awal',$request->harga_awal);
        Session::flash('deskripsi_barang',$request->deskripsi_barang);

        $request->validate([
            'nama_barang' => 'required',
            'tgl' => 'required',
            'harga_awal' => 'required',
            'deskripsi_barang' => 'required',
        ],[
            'nama_barang.required' => 'Nama Barang Harus di isi',
            'tgl.required' => 'Tanggal Harus di isi',
            'harga_awal.required' => 'Harga Awal Harus di isi',
            'harga_awal.required' => 'Deskripsi Barang Harus di isi',
        ]);

        Barang::create($request->all());
        return back()->with('success','Data Barang berhasil tersimpan');
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
    public function update(Request $request, string $id_barang)
    {
        Session::flash('nama_barang',$request->nama_barang);
        Session::flash('tgl',$request->tgl);
        Session::flash('harga_awal',$request->harga_awal);
        Session::flash('deskripsi_barang',$request->deskripsi_barang);

        $request->validate([
            'nama_barang' => 'required',
            'tgl' => 'required',
            'harga_awal' => 'required',
            'deskripsi_barang' => 'required',
        ],[
            'nama_barang.required' => 'Nama Barang Harus di isi',
            'tgl.required' => 'Tanggal Harus di isi',
            'harga_awal.required' => 'Harga Awal Harus di isi',
            'deskripsi_barang.required' => 'Deskripsi Barang Harus di isi',
        ]);

        $data = [
            'nama_barang' => $request->nama_barang,
            'tgl' => $request->tgl,
            'harga_awal' => $request->harga_awal,
            'deskripsi_barang' => $request->deskripsi_barang,
        ];
        Barang::where('id_barang',$id_barang)->update($data);
        return back()->with('success','Data Barang berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_barang)
    {
        Barang::where('id_barang', $id_barang)->delete();
        return back()->with('success','Data Barang berhasil di hapus');
    }
}
