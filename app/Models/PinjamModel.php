<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_pinjam";
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

    public function pembayaran()
    {
        return $this->hasMany(BayarModel::class);
    }

    public static function pinjam($idanggota, $jmlh_pinjam, $tgl_pinjam)
    {
        $peminjaman = new PinjamModel;
        $peminjaman->idanggota = $idanggota;
        $peminjaman->jmlh_pinjam = $jmlh_pinjam;
        $peminjaman->tgl_pinjam = $tgl_pinjam;
        $peminjaman->save();

        return $peminjaman;
    }

    public function daftarPeminjaman()
    {
        $peminjaman = PinjamModel::all();

        return view('halaman/view_pinjam', compact('peminjaman'));
    }

}