<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}