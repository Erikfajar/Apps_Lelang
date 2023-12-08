<!-- Modal -->
<div class="modal fade" id="createPenawaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Penawaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('penawaran.store') }}" method="post">
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
                        <label class="form-label">Penawaran Harga</label>
                        <input class="form-control" maxlength="20" name="penawaran_harga" type="number" placeholder="Penawaran Harga">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Masyarakat/User</label>
                        <select class="form-control" name="id_user" id="">
                            <option value="" selected disabled>Pilih Masyarakat/User</option>
                            @foreach ($dataMasyarakat as $masyarakat)
                            <option value="{{ $masyarakat->id_user }}">{{ $masyarakat->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lelang</label>
                        <select class="form-control" name="id_lelang" id="">
                            <option value="" selected disabled>Pilih Lelang</option>
                            @foreach ($dataLelang as $lelang)
                            <option value="{{ $lelang->id_lelang }}">{{ $lelang->barang->nama_barang }}</option>
                            @endforeach
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
