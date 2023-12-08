@extends('Layout.layout')

@section('content')
      <!-- Page Header-->
      <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
          <h2 class="h5 mb-0">Data Lelang</h2>
        </div>
      </div>
      <!-- Breadcrumb-->
      <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 py-3 px-0">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createLelang">
                Tambah Lelang
              </button>
              @include('Halaman.Lelang.modal_create')
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
                      <th style="text-align: left">Nama Barang</th>
                      <th style="text-align: left">Tgl Lelang</th>
                      <th style="text-align: left">Harga Akhir</th>
                      <th style="text-align: left">User</th>
                      <th style="text-align: left">Petugas</th>
                      <th style="text-align: left">Status</th>
                      <th style="text-align: left">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td style="text-align: left">{{$loop->iteration}}</td>
                        <td style="text-align: left">{{ $item->barang->nama_barang }}</td>
                        <td style="text-align: left">{{$item->tgl_lelang}}</td>
                        <td style="text-align: left">{{ $item->harga_akhir }}</td>
                        <td style="text-align: left">{{ $item->masyarakat->nama_lengkap }}</td>
                        <td style="text-align: left">{{ $item->petugas->nama_petugas }}</td>
                        <td style="text-align: left">{{ $item->status }}</td>
                        <td style="text-align: left">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editLelang{{ $item->id_lelang }}">
                                Edit
                              </button>
                              @include('Halaman.Lelang.modal_edit')
                              <form action="{{ route('barang_lelang.destroy',$item->id_lelang) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin mau hapus data?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">Del</button>
                              </form>
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