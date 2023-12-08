<?php

namespace App\Http\Controllers\Halaman;

use App\Models\Barang;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Models\History_lelang;
use App\Http\Controllers\Controller;
use App\Models\Lelang;
use Illuminate\Support\Facades\Session;

class PenawaranCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataLelang = Lelang::with('barang')->orderBy('id_lelang','desc')->get();
        $dataMasyarakat = Masyarakat::orderBy('id_user','desc')->get();
        $dataBarang = Barang::orderBy('id_barang','desc')->get();
        $data = History_lelang::orderBy('id_history','desc')->get();
       return view('Halaman.Penawaran.index',compact('data','dataMasyarakat','dataBarang','dataLelang'));
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
        Session::flash('id_lelang',$request->id_lelang);
        Session::flash('id_barang',$request->id_barang);
        Session::flash('id_user',$request->id_user);
        Session::flash('penawaran_harga',$request->penawaran_harga);

        $request->validate([
            'id_lelang'=> 'required',
            'id_barang'=> 'required',
            'id_user'=> 'required',
            'penawaran_harga'=> 'required',
        ],[
            'id_lelang.required'=> 'Lelag harus di isi',
            'id_barang.required'=> 'Barang harus di isi',
            'id_user.required'=> 'User/Masyarakat harus di isi',
            'penawaran_harga.required'=> 'Penawaran harga harus di isi',
        ]);

        History_lelang::create($request->all());
        return back()->with('success','Pennawaran berhasil di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_history)
    {
        // $dataLelang = Lelang::with('barang')->orderBy('id_lelang','desc')->get();
        // $dataMasyarakat = Masyarakat::orderBy('id_user','desc')->get();
        // $dataBarang = Barang::orderBy('id_barang','desc')->get();
        $item = History_lelang::with('masyarakat','lelang','barang')->findOrFail($id_history);
        return view('Halaman.Laporan.laporan',compact('item',));
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
    public function update(Request $request, string $id_history)
    {
        Session::flash('id_lelang',$request->id_lelang);
        Session::flash('id_barang',$request->id_barang);
        Session::flash('id_user',$request->id_user);
        Session::flash('penawaran_harga',$request->penawaran_harga);

        $request->validate([
            'id_lelang'=> 'required',
            'id_barang'=> 'required',
            'id_user'=> 'required',
            'penawaran_harga'=> 'required',
        ],[
            'id_lelang.required'=> 'Lelag harus di isi',
            'id_barang.required'=> 'Barang harus di isi',
            'id_user.required'=> 'User/Masyarakat harus di isi',
            'penawaran_harga.required'=> 'Penawaran harga harus di isi',
        ]);

        $data = [
            'id_lelang'=> $request->id_lelang,
            'id_barang'=> $request->id_barang,
            'id_user'=> $request->id_user,
            'penawaran_harga'=> $request->penawaran_harga,
        ];

        History_lelang::where('id_history', $id_history)->update($data);
        return back()->with('success','Pennawaran berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_history)
    {
        History_lelang::find($id_history)->delete();
        return back()->with('success','Data berhasil di hapus');
    }
}
