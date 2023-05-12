<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSimpanModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_jenissimpan";
    protected $primaryKey   = "idjenis";
    protected $fillable     = ['idjenis','jenis_simpan'];
}