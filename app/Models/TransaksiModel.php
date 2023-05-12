<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_transaksi";
    protected $primaryKey   = "idtransaksi";
    protected $fillable     = ['idtransaksi','idanggota','idpetugas','total_transaksi','tgl_transaksi'];

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
