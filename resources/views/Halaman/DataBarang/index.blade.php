@extends('Layout.layout')

@section('content')
    <!-- Page Header-->
    <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
            
            <h2 class="h5 mb-0">Pendataan Barang</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 py-3 px-0">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBarang">
                    Tambah Barang
                </button>
            </ol>
        </nav>
    </div>
    <section class="tables py-0">
        <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-lg-12">
                    @include('Layout.pesan')
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="h4 mb-0">

                            </h3>
                            @include('Halaman.DataBarang.modal_create')
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0 table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align: left">#</th>
                                            <th style="text-align: left">Nama Barang</th>
                                            <th style="text-align: left">TGL</th>
                                            <th style="text-align: left">Harga Awal</th>
                                            <th style="text-align: left">Deskripsi Barang</th>
                                            <th style="text-align: left">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td style="text-align: left">{{ $loop->iteration }}</td>
                                                <td style="text-align: left">{{ $item->nama_barang }}</td>
                                                <td style="text-align: left">{{ $item->tgl }}</td>
                                                <td style="text-align: left">{{ $item->harga_awal }}</td>
                                                <td style="text-align: left">{{ $item->deskripsi_barang }}</td>
                                                <td style="text-align: left">
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#editBarang{{ $item->id_barang }}">
                                                        Edit
                                                    </button>
                                                    @include('Halaman.DataBarang.modal_edit')
                                                    <form action="{{route('data_barang.destroy',$item->id_barang)}}" method="post" class="d-inline"
                                                        onsubmit="return confirm('Yakin mau hapus data?')">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Del</button>
                                                    </form>
                                                </td>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
