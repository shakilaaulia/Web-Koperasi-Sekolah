<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbilModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_ambil";
    protected $primaryKey   = "idambil";
    protected $fillable     = ['idambil','idanggota','idpetugas','jmlh_bayar','tgl_bayar'];

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