<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamModel;
use App\Models\PetugasModel;
use App\Models\AnggotaModel;
use App\Models\BayarModel;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;


class PinjamController extends Controller
{
    
    public function pinjamtampil()
    {
        $datapinjam = PinjamModel::orderby('idpinjam', 'ASC')
        ->paginate(5);
        $databayar = BayarModel::all();

        $datapetugas    = PetugasModel::all();
        $dataanggota    = AnggotaModel::all();
    

        return view('halaman/view_pinjam',['pinjam'=>$datapinjam,'bayar'=>$databayar,'petugas'=>$datapetugas,'anggota'=>$dataanggota]);
    }

    public function coba()
    {

    

        return view('halaman/view_coba');
    }

    public function pinjamtambah(Request $request){
        $this->validate($request, [
            'anggota' => 'required',
            'petugas' => 'required',
            'jmlh_pinjam' => 'required'
        ]);

        PinjamModel::create([
           'idanggota' => $request->anggota,
           'idpetugas' => $request->petugas, 
           'jmlh_pinjam' => $request->jmlh_pinjam,
           'tgl_pinjam' => Carbon::now(),
        ]);

        return redirect()->back();
    }

    public function pinjamEdit($idpinjam, Request $request){
        $this->validate($request, [
            'anggota' => 'required',
            'petugas' => 'required',
            'jmlh_pinjam' => 'required'
        ]);
        
        $pinjam = PinjamModel::find($idpinjam);
        $pinjam->idanggota = $request->anggota;
        $pinjam->idpetugas = $request->petugas;
        $pinjam->jmlh_pinjam = $request->jmlh_pinjam;
        $pinjam->save();

        return redirect()->back();
    }

    public function pinjamhapus($idpinjam){
        $datapinjam=PinjamModel::find($idpinjam);
        $datapinjam->delete();
        
        return redirect()->back();
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