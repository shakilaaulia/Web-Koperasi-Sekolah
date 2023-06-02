<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpanModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_simpan";
    protected $primaryKey   = "idsimpan";
    protected $fillable     = ['idsimpan','idanggota','idpetugas','jenis_simpan','jmlh_bayar','tgl_bayar'];

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

    public function jenisSimpan(){
        return $this->belongsTo('App\Models\JenisSimpanModel', 'jenis_simpan');
    }

}