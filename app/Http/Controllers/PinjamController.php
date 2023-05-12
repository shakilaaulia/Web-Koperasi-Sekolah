<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamModel;
use App\Models\PetugasModel;
use App\Models\AnggotaModel;
use App\Models\BayarModel;
use Illuminate\Support\Facades\DB;


class PinjamController extends Controller
{
    
    public function pinjamtampil()
    {
        $datapinjam = PinjamModel::orderby('idpinjam', 'ASC')
        ->paginate(5);

        $datapetugas    = PetugasModel::all();
        $dataanggota    = AnggotaModel::all();
    

        return view('halaman/view_pinjam',['pinjam'=>$datapinjam,'petugas'=>$datapetugas,'anggota'=>$dataanggota]);
    }

    public function coba()
    {

    

        return view('halaman/view_coba');
    }


    public function tampil() 
    { 
        // mengambil data dari table guru 
        $anggota = DB::table('tbl_anggota')->paginate(5); 
        
        // mengirim data guru ke view index 
        return view('halaman/view_coba',['anggota' => $anggota]); 
    }
    
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        
        // mengambil data dari table guru sesuai pencarian data
        $anggota = DB::table('tbl_anggota')
        ->where('nama','like',"%".$cari."%")
        ->paginate();
        
        // mengirim data pegawai ke view index
        return view('halaman/view_coba',['anggota' => $anggota]);
    }

    
    /*public function pinjamUang(Request $request)
    {
        $idanggota = $request->input('idanggota');
        $jmlh_pinjam = $request->input('jmlh_pinjam');
        $tgl_pinjam = $request->input('tgl_pinjam');

        $peminjaman = PinjamModel::pinjamUang($idanggota, $jmlh_pinjam, $tgl_pinjam);

        return response()->json($peminjaman);
    }

    public function bayarUang(Request $request)
    {
        $idpinjam = $request->input('idpinjam');
        $jmlh_bayar = $request->input('jmlh_bayar');
        $tgl_bayar = $request->input('tgl_bayar');

        $pembayaran = BayarModel::bayarUang($idpinjam, $jmlh_bayar, $tgl_bayar);

        return response()->json($pembayaran);
    }*/
}
