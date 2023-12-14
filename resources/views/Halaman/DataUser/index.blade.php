@extends('Layout.layout')

@section('content')
      <!-- Page Header-->
      <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
          <h2 class="h5 mb-0">Data User</h2>
        </div>
      </div>
      <!-- Breadcrumb-->
      <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 py-3 px-0">

             
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
               Data User 
              </h3>
        
            </div>
            <div class="card-body pt-0">
              <div class="table-responsive">
                <table class="table mb-0 table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="text-align: left">#</th>
                      <th style="text-align: left">Nama Lengkap</th>
                      <th style="text-align: left">Username</th>
                      {{-- <th style="text-align: left">Password</th> --}}
                      <th style="text-align: left">No.Telp</th>
                      <th style="text-align: left">Action</th>
                    </tr>
                  </thead>
                 <tbody>
                    @foreach ($dataUser as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nama_lengkap }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->telp }}</td>
                        <td>
                            <form action="{{ route('data_user_delete',$user->id_user) }}" method="post" onsubmit="return confirm('Yakinn hapus data ini')">
                                @csrf
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
  <section></section>
  <section class="tables py-0">
    <div class="container-fluid">
      <div class="row gy-4">
        <div class="col-lg-12">
          <div class="card mb-0">
            <div class="card-header">
              <h3 class="h4 mb-0">
               Data Petugas 
              </h3>
        
            </div>
            <div class="card-body pt-0">
              <div class="table-responsive">
                <table class="table mb-0 table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="text-align: left">#</th>
                      <th style="text-align: left">Nama Petugas</th>
                      <th style="text-align: left">Username</th>
                
                      <th style="text-align: left">Level</th>
                      <th style="text-align: left">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataPetugas as $petugas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $petugas->nama_petugas }}</td>
                        <td>{{ $petugas->username }}</td>
                        <td>{{ $petugas->level->level }}</td>
                        <td>
                            <form action="{{ route('data_petugas_delete',$petugas->id_petugas) }}" method="post" onsubmit="return confirm('Yakinn hapus data ini')">
                                @csrf
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