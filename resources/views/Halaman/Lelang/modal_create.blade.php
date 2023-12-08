<!-- Modal -->
<div class="modal fade" id="createLelang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Barang Lelang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('barang_lelang.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <select class="form-control" name="id_barang" id="">
                            <option value="" selected disabled>Pilih Barang</option>
                            @foreach ($dataBarang as $barang)
                            <option value="{{$barang->id_barang}}">{{ $barang->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lelang</label>
                        <input class="form-control" name="tgl_lelang" type="date">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Akhir</label>
                        <input class="form-control" maxlength="20" name="harga_akhir" type="number" placeholder="Harga Akhir">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Masyarakat/User</label>
                        <select class="form-control" name="id_user" id="">
                            <option value="" selected disabled>Pilih Masyarakat</option>
                            @foreach ($dataMasyarakat as $masyarakat)
                            <option value="{{ $masyarakat->id_user }}">{{ $masyarakat->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Petugas</label>
                        <select class="form-control" name="id_petugas" id="">
                            <option value="" selected disabled>Pilih Petugas</option>
                            @foreach ($dataPetugas as $petugas)
                            <option value="{{ $petugas->id_petugas }}">{{ $petugas->nama_petugas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status" id="">
                            <option value="" selected disabled>Pilih Status</option>
                            <option value="dibuka">Di Buka</option>
                            <option value="ditutup">Di Tutup</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
