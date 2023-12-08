<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'tb_barang';
    protected $fillable = ['nama_barang','tgl','harga_awal','deskripsi_barang'];
    public $timestamps = false;
    public $primaryKey = 'id_barang';

    public function history_lelang()
    {
        return $this->hasMany(History_lelang::class, 'id_barang','id_barang');
    }
    public function lelang()
    {
        return $this->hasMany(Lelang::class, 'id_barang','id_barang');
    }
}
