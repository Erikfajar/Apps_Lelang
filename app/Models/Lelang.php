<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;
    protected $table= 'tb_lelang';
    protected $fillable = [
        'id_barang','tgl_lelang','harga_akhir','id_user','id_petugas','status'
    ];
    public $timestamps = false;
    public $primaryKey = 'id_lelang';

    public function history_lelang()
    {
        return $this->hasMany(History_lelang::class,'id_lelang','id_lelang');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang','id_barang');
    }
    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'id_user','id_user');
    }
    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas','id_petugas');
    }
}
