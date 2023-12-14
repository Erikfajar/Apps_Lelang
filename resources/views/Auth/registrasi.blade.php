@extends('Layout.layout')

@section('content')
    <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
            <h2 class="h5 mb-0">Data Lelang</h2>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="h4 mb-0">Form Registrasi User / Masyarakat</h3>
                        </div>
                        <div class="card-body pt-0">
                            <p class="text-sm">Harap di isi semua</p>
                            <form class="form-horizontal" action="{{ route('regis_user') }}" method="POST">
                                @csrf
                                <div class="row gy-2 mb-4">
                                    <label class="col-sm-3 form-label" for="inputHorizontalElOne">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" maxlength="25" name="nama_lengkap"
                                            id="inputHorizontalElOne" type="text" placeholder="Nama Lengkap"><small
                                            class="form-text">Maksimal 25 karakter</small>
                                    </div>
                                </div>
                                <div class="row gy-2 mb-4">
                                    <label class="col-sm-3 form-label" for="inputHorizontalElTwo">username</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" maxlength="25" name="username" id="inputHorizontalElTwo"
                                            type="text" placeholder="Username"><small class="form-text">Maksimal 25
                                            karakter</small>
                                    </div>
                                </div>
                                <div class="row gy-2 mb-4">
                                    <label class="col-sm-3 form-label" for="inputHorizontalElTwo">Password</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" max="25" name="password" id="inputHorizontalElTwo"
                                            type="password" placeholder="Password"><small class="form-text">Maksimal 25
                                            karakter</small>
                                    </div>
                                </div>
                                <div class="row gy-2 mb-4">
                                    <label class="col-sm-3 form-label" for="inputHorizontalElTwo">No Telpon</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" maxlength="25" name="telp" id="inputHorizontalElTwo"
                                            type="number" placeholder="No Telpon"><small class="form-text">Maksimal 25
                                            karakter</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 ms-auto">
                                        <input class="btn btn-primary" type="submit" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tables py-0">
        <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="h4 mb-0">Form Registrasi Petugas</h3>
                        </div>
                        <div class="card-body pt-0">
                            <p class="text-sm">Harap di isi semua</p>
                            <form class="form-horizontal" action="{{ route('regis_petugas') }}" method="POST">
                                @csrf
                                <div class="row gy-2 mb-4">
                                    <label class="col-sm-3 form-label" for="inputHorizontalElOne">Nama Petugas</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" maxlength="25" name="nama_petugas"
                                            id="inputHorizontalElOne" type="text" placeholder="Nama Petugas"><small
                                            class="form-text">Maksimal 25 karakter</small>
                                    </div>
                                </div>
                                <div class="row gy-2 mb-4">
                                    <label class="col-sm-3 form-label" for="inputHorizontalElTwo">username</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" maxlength="25" name="username" id="inputHorizontalElTwo"
                                            type="text" placeholder="Username"><small class="form-text">Maksimal 25
                                            karakter</small>
                                    </div>
                                </div>
                                <div class="row gy-2 mb-4">
                                    <label class="col-sm-3 form-label" for="inputHorizontalElTwo">Password</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" max="25" name="password"
                                            id="inputHorizontalElTwo" type="password" placeholder="Password"><small
                                            class="form-text">Maksimal 25 karakter</small>
                                    </div>
                                </div>
                                <div class="row gy-2 mb-4">
                                    <label class="col-sm-3 form-label" for="inputHorizontalElTwo">Level</label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name="id_level" id="">
                                        <option value="" selected disabled>Pilih Level</option>
                                        <option value="1">Administrator</option>
                                        <option value="2">Petugas</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 ms-auto">
                                        <input class="btn btn-primary" type="submit" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
