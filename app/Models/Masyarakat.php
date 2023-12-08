<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as model;

class Masyarakat extends Model
{
    use HasFactory;
    protected $table = 'tb_masyarakat';
    protected $fillable = [
        'nama_lengkap','username','password','telp'
    ];
    public $timestamps = false;
    public $primaryKey = 'id_user';

    public function history_lelang()
    {
        return $this->hasMany(History_lelang::class, 'id_user','id_user');
    }
    public function lelang()
    {
        return $this->hasMany(Lelang::class, 'id_user','id_user');
    }
}
