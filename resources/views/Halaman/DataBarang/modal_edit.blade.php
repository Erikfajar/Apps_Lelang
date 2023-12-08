<!-- Modal -->
<div class="modal fade" id="editBarang{{ $item->id_barang }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Barang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('data_barang.update',$item->id_barang) }}" method="post">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input value="{{ $item->nama_barang }}" class="form-control" maxlength="25" name="nama_barang" type="text" placeholder="Masukan Nama barang">
              </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input value="{{ $item->tgl }}" class="form-control" name="tgl" type="date" >
              </div>
            <div class="mb-3">
                <label class="form-label">Harga Awal</label>
                <input value="{{ $item->harga_awal }}" class="form-control" maxlength="20" name="harga_awal" type="number" >
              </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi Barang</label>
              <textarea name="deskripsi_barang"  class="form-control" id="" cols="30" rows="10">{{ $item->deskripsi_barang }}</textarea>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>