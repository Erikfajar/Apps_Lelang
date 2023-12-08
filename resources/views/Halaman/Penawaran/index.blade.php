@extends('Layout.layout')

@section('content')
      <!-- Page Header-->
      <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
          <h2 class="h5 mb-0">Data Penawaran</h2>
        </div>
      </div>
      <!-- Breadcrumb-->
      <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 py-3 px-0">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPenawaran">
                Tambah Penawaran
              </button>
              @include('Halaman.Penawaran.modal_create')
          
          </ol>
        </nav>
      </div>
  <section class="tables py-0">
    <div class="container-fluid">
      <div class="row gy-4">
        <div class="col-lg-12">
          <div class="card mb-0">
            <div class="card-header">
              <h3 class="h4 mb-0">
               
              </h3>
        
            </div>
            <div class="card-body pt-0">
              <div class="table-responsive">
                <table class="table mb-0 table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="text-align: left">#</th>
                      <th style="text-align: left">Lelang</th>
                      <th style="text-align: left">Barang</th>
                      <th style="text-align: left">User</th>
                      <th style="text-align: left">Penawaran Harga</th>
                      <th style="text-align: center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->lelang->barang->nama_barang }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->masyarakat->nama_lengkap }}</td>
                        <td>{{ $item->penawaran_harga }}</td>
                        <td style="text-align: center">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editPenawaran{{ $item->id_history }}">
                                Edit
                              </button>
                              @include('Halaman.Penawaran.modal_edit')
                              <form class="d-inline" onsubmit="return confirm('Yakin mau hapus data ini')" action="{{ route('penawaran.destroy',$item->id_history) }}" method="post">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger" type="submit">Del</button>
                              </form>
                              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#laporan{{ $item->id_history }}">
                               Laporan
                              </button>
                              @include('Halaman.Laporan.index')
                        </td>
                    </tr>
                    @endforeach
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