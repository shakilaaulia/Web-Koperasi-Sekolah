<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BayarModel;
use App\Models\PinjamModel;

class AnggotaModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_anggota";
    protected $primaryKey   = "idanggota";
    protected $fillable     = ['idanggota','nip','nama','jabatan','tgl_lahir','jk','alamat','hp'];

    public function detailData($idanggota)
    {
        return DB::table('tbl_anggota')->where('idanggota', $idanggota)->first();
    }

    public function pinjam(){
        return $this->hasMany('App\Models\PinjamModel', 'idanggota');
    }
    public function bayar(){
        return $this->hasMany('App\Models\BayarModel', 'idanggota');
    }

    public function simpan(){
        return $this->hasMany('App\Models\SimpanModel', 'idanggota');
    }
    public function ambil(){
        return $this->hasMany('App\Models\AmbilModel', 'idanggota');
    }

    public function totalPinjam(){
        $totalpinjam = 0;
        foreach($this->pinjam as $p){
            $totalpinjam += $p->jmlh_pinjam;
        }
        foreach($this->bayar as $b){
            $totalpinjam -= $b->jmlh_bayar;
        }
        return $totalpinjam;
    }

    public function transaksiPinjam(){
        return $this->pinjam->concat($this->bayar)->sortBy('created_at');
    }

    public function totalSimpan(){
        $totalSimpan = 0;
        foreach($this->simpan as $s){
            $totalSimpan += $s->jmlh_bayar;
        }
        foreach($this->ambil as $a){
            $totalSimpan -= $a->jmlh_bayar;
        }
        return $totalSimpan;
    }

    public function transaksiSimpan(){
        return $this->simpan->concat($this->ambil)->sortBy('created_at');
    }
}