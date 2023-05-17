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
    
    // public function pinjamtampil()
    // {
    //     $datapinjam = PinjamModel::orderby('idpinjam', 'ASC')
    //     ->paginate(1);

    //     $datapetugas    = PetugasModel::all();
    //     $dataanggota    = AnggotaModel::all();
    

    //     return view('halaman/view_pinjam',['pinjam'=>$datapinjam,'petugas'=>$datapetugas,'anggota'=>$dataanggota]);
    // }


    public function pinjamtampil() 
    { 
        // mengambil data dari table guru 
        $anggota = DB::table('tbl_anggota')->paginate(1); 
        
        // mengirim data guru ke view index 
        return view('halaman/view_pinjam',['anggota' => $anggota]); 
    }
    
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        
        // mengambil data dari table guru sesuai pencarian data
        $anggota = DB::table('tbl_anggota')
        ->where('nama','like',"%".$cari."%");
        
        // mengirim data pegawai ke view index
        return view('halaman/view_pinjam',['anggota' => $anggota]);
    }

      
    
    public function pinjamUang($idanggota, Request $request)
    {
        $idanggota = $request->input('idanggota');
        $jmlh_pinjam = $request->input('jmlh_pinjam');
        $tgl_pinjam = $request->input('tgl_pinjam');

        $peminjaman = PinjamModel::pinjamUang($idanggota, $jmlh_pinjam, $tgl_pinjam);

        return response()->json($peminjaman);
    }

    public function tampil()
    {
        $datapinjam = PinjamModel::orderby('idpinjam', 'ASC')
        ->paginate(5);

        $datapetugas    = PetugasModel::all();
        $datasiswa      = SiswaModel::all();
        $databuku       = BukuModel::all();

        return view('halaman/view_pinjam',['pinjam'=>$datapinjam,'petugas'=>$datapetugas,'siswa'=>$datasiswa,'buku'=>$databuku]);
    }


//     public function pinjamedit($idpinjam, Request $request)
// {
//     $this->validate($request, [
//         'idpetugas' => 'required',
//         'idsiswa' => 'required',
//         'idbuku' => 'required'
//     ]);

//     $idpinjam = PinjamModel::find($idpinjam);
//     $idpinjam->idpetugas    = $request->idpetugas;
//     $idpinjam->idsiswa      = $request->idsiswa;
//     $idpinjam->idbuku       = $request->idbuku;

//     $idpinjam->save();

//     return redirect()->back();
// }

//method untuk edit data peminjaman
public function pinjamtambah($idpinjam, Request $request)
{
    $this->validate($request, [
        'idanggota' => 'required',
        'idpetugas' => 'required',
        'jmlh_pinjam' => 'required',
        'tgl_pinjam' => 'required'
    ]);

    $idpinjam = PinjamModel::find($idanggota);
    $idpinjam->idanggota    = $request->idanggota;
    $idpinjam->idsiswa      = $request->idsiswa;
    $idpinjam->idbuku       = $request->idbuku;

    $idpinjam->save();

    return redirect()->back();
}

    // public function bayarUang(Request $request)
    // {
    //     $idpinjam = $request->input('idpinjam');
    //     $jmlh_bayar = $request->input('jmlh_bayar');
    //     $tgl_bayar = $request->input('tgl_bayar');

    //     $pembayaran = BayarModel::bayarUang($idpinjam, $jmlh_bayar, $tgl_bayar);

    //     return response()->json($pembayaran);
    // }
}
