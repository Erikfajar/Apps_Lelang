<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table = "tb_level";
    protected $fillable = ['level'];
    public $timestamps = false;
    public $primaryKey = 'id_level';

    public function petugas()
    {
        return $this->hasMany(Petugas::class, 'id_level','id_level');
    }
}
