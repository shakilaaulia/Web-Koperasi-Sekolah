<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_bayar";
    protected $primaryKey   = "idbayar";
    protected $fillable     = ['idbayar','idanggota','idpetugas','jmlh_bayar','tgl_bayar'];

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

    public function peminjaman()
    {
        return $this->belongsTo(PinjamModel::class);
    }

    public static function bayarUang($idpinjam, $jmlh_bayar, $tgl_bayar)
    {
        $pembayaran = new BayarModel;
        $pembayaran->idpinjam = $idpinjam;
        $pembayaran->jmlh_bayar = $jmlh_bayar;
        $pembayaran->tgl_bayar = $tgl_bayar;
        $pembayaran->save();

        return $pembayaran;
    }

    
}