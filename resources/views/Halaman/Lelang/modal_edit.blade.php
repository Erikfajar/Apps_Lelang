<!-- Modal -->
<div class="modal fade" id="editLelang{{ $item->id_lelang }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Barang Lelang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('barang_lelang.update',$item->id_lelang) }}" method="post">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <select class="form-control" name="id_barang" id="">
                            <option value="{{ $item->id_barang }}" selected>{{ $item->barang->nama_barang }}</option>
                            <option value="" disabled>Pilih Barang</option>
                            @foreach ($dataBarang as $barang)
                            <option value="{{$barang->id_barang}}">{{ $barang->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lelang</label>
                        <input class="form-control" value="{{ $item->tgl_lelang }}" name="tgl_lelang" type="date">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Akhir</label>
                        <input class="form-control" value="{{ $item->harga_akhir }}" maxlength="20" name="harga_akhir" type="number" placeholder="Harga Akhir">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Masyarakat/User</label>
                        <select class="form-control" name="id_user" id="">
                            <option value="{{ $item->id_user }}" selected>{{ $item->masyarakat->nama_lengkap }}</option>
                            <option value="" disabled>Pilih Masyarakat</option>
                            @foreach ($dataMasyarakat as $masyarakat)
                            <option value="{{ $masyarakat->id_user }}">{{ $masyarakat->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Petugas</label>
                        <select class="form-control" name="id_petugas" id="">
                            <option value="{{ $item->id_petugas }}" selected>{{ $item->petugas->nama_petugas }}</option>
                            <option value="" disabled>Pilih Petugas</option>
                            @foreach ($dataPetugas as $petugas)
                            <option value="{{ $petugas->id_petugas }}">{{ $petugas->nama_petugas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status" id="">
                            <option value="{{$item->status}}" selected>{{ $item->status }}</option>
                            <option value="" disabled>Pilih Status</option>
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
