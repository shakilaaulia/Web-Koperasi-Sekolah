<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_produk";
    protected $primaryKey   = "idpinjam";
    protected $fillable     = ['idpinjam','idanggota','idpetugas','jmlh_pinjam','tgl_pinjam'];

    //relasi ke anggota
    public function anggota()
    {
        return $this->belongsTo('App\Models\AnggotaModel', 'idanggota');
    }


    //relasi ke petugas
    public function petugas()
    {
        return $this->belongsTo('App\Models\PetugasModel', 'idpetugas');
    }
}
