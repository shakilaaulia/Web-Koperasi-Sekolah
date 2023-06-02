<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamModel;
use App\Models\PetugasModel;
use App\Models\AnggotaModel;
use App\Models\BayarModel;
use App\Models\SimpanModel;
use App\Models\JenisSimpanModel;

use Carbon\Carbon;

class SimpanController extends Controller
{
    public function simpantampil(){
        $datasimpan = SimpanModel::orderby('idsimpan', 'ASC')
        ->paginate(5);

        $datapetugas    = PetugasModel::all();
        $datajenis      = JenisSimpanModel::all();
        $dataanggota    = AnggotaModel::all();

        return view('halaman/view_simpan',['simpan'=>$datasimpan,'petugas'=>$datapetugas,'anggota'=>$dataanggota, 'jenis_simpan' => $datajenis]);
    }

    public function simpantambah(Request $request){
        $this->validate($request, [
            'anggota' => 'required',
            'petugas' => 'required',
            'jmlh_bayar' => 'required',
            'jenis_simpan' => 'required',
        ]);

        SimpanModel::create([
           'idanggota' => $request->anggota,
           'idpetugas' => $request->petugas, 
           'jmlh_bayar' => $request->jmlh_bayar,
           'jenis_simpan' => $request->jenis_simpan,
           'tgl_bayar' => Carbon::now(),
        ]);

        return redirect()->back();
    }

    public function simpanedit($idsimpan, Request $request){
        $this->validate($request, [
            'anggota' => 'required',
            'petugas' => 'required',
            'jmlh_bayar' => 'required',
            'jenis_simpan' => 'required',
        ]);
        
        $simpan = SimpanModel::find($idsimpan);
        $simpan->idanggota = $request->anggota;
        $simpan->idpetugas = $request->petugas;
        $simpan->jenis_simpan = $request->jenis_simpan;
        $simpan->jmlh_bayar = $request->jmlh_bayar;
        $simpan->save();

        return redirect()->back();    
    }

    public function simpanhapus($idsimpan){
        $datasimpan=SimpanModel::find($idsimpan);
        $datasimpan->delete();
        
        return redirect()->back();
    }
}