<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiModel extends Model
{
    use HasFactory;
    protected $table        = "detail_transaksi";
    protected $primaryKey   = "id_detail_transaksi";
    protected $fillable     = ['id_detail_transaksi','idtransaksi','idproduk','jmlh_produk'];

    //relasi ke transaksi
    public function transaksi()
    {
        return $this->belongsTo('App\Models\TransaksiModel', 'idtransaksi');
    }


    //relasi ke produk
    public function produk()
    {
        return $this->belongsTo('App\Models\ProdukModel', 'idproduk');
    }
}
