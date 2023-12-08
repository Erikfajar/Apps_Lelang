<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as model;


class Petugas extends Model
{
    use HasFactory;
    protected $table = 'tb_petugas';
    protected $fillable = [
        'nama_petugas','username','password','id_level'
    ];
    public $timestamps = false;
    public $primaryKey = 'id_petugas';

    public function level()
    {
        return $this->belongsTo(Level::class,'id_level','id_level');
    }

    public function lelang()
    {
        return $this->hasMany(Lelang::class,'id_petugas','id_petugas');
    }
}
