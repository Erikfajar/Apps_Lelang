<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .struk-container {
            width: 700px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        .item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .total {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
    <title>Struk Belanja</title>
</head>
<body>

<div class="struk-container">
    <h3>STRUK PENAWARAN BARANG LELANG</h3>
    <p>User : {{ $item->masyarakat->nama_lengkap }}</p>
    <p>Telepon: 123456789</p>

    <hr>

    <div class="item">
        <span><b>Lelang</b></span>
        <span></span>
    </div>
    <div class="item">
        <span style="margin-left: 8px">1. Barang</span>
        <span>{{ $item->lelang->barang->nama_barang }}</span>
    </div>
    <div class="item">
        <span style="margin-left: 8px">2. Tanggal Lelang</span>
        <span>{{ $item->lelang->tgl_lelang }}</span>
    </div>
    <div class="item">
        <span style="margin-left: 8px">3. Harga Akhir</span>
        <span>{{ $item->lelang->harga_akhir }}</span>
    </div>
    <div class="item">
        <span style="margin-left: 8px">4. User</span>
        <span>{{ $item->lelang->masyarakat->nama_lengkap }}</span>
    </div>
    <div class="item">
        <span style="margin-left: 8px">5. Petugas</span>
        <span>{{ $item->lelang->petugas->nama_petugas }}</span>
    </div>
    <div class="item">
        <span style="margin-left: 8px">6. Status</span>
        <span>{{ $item->lelang->status }}</span>
    </div>
    <div class="item">
        <span><b>Barang</b></span>
        <span></span>
    </div>
    <div class="item">
        <span style="margin-left: 8px">1. Nama Barang</span>
        <span>{{ $item->barang->nama_barang }}</span>
    </div>
    <div class="item">
        <span style="margin-left: 8px">2. Tanggal</span>
        <span>{{ $item->barang->tgl }}</span>
    </div>
    <div class="item">
        <span style="margin-left: 8px">3. Harga Awal</span>
        <span>{{ $item->barang->harga_awal }}</span>
    </div>
    <div class="item">
        <span style="margin-left: 8px">4. Deskripsi Barang</span>
        <span>{{ $item->barang->deskripsi_barang }}</span>
    </div>
    <div class="item">
        <span><b>User/Masyarakat</b></span>
        <span></span>
    </div>
    <div class="item">
        <span style="margin-left: 8px">1. Nama Lengkap</span>
        <span>{{ $item->masyarakat->nama_lengkap }}</span>
    </div>
    <div class="item">
        <span style="margin-left: 8px">2. No.Telp</span>
        <span>{{ $item->masyarakat->telp }}</span>
    </div>
    <div class="item">
        <span><b>Penawaran Harga</b></span>
        <span>{{ $item->penawaran_harga }}</span>
    </div>
    <hr>

    <div class="total">
        <span>Total</span>
        <span>Rp. {{ $item->penawaran_harga }}</span>
    </div>

    <hr>

    <p>Terima kasih</p>
</div>
<script>
    document.getElementById('downloadButton').addEventListener('click', function () {
        var element = document.body; // Anda dapat mengganti ini sesuai dengan elemen yang ingin Anda konversi ke PDF
        html2pdf(element);
    });
</script>
</body>
</html>
