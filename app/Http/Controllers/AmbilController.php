<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AmbilModel;
use Carbon\Carbon;

class AmbilController extends Controller
{
    
    public function ambiltambah(Request $request){
        $this->validate($request, [
            'anggota' => 'required',
            'petugas' => 'required',
            'jmlh_bayar' => 'required'
        ]);

        AmbilModel::create([
            'idanggota' => $request->anggota,
            'idpetugas' => $request->petugas, 
            'jmlh_bayar' => $request->jmlh_bayar,
            'tgl_bayar' => Carbon::now(),
        ]);

        return redirect()->back();
    }

    public function ambilhapus($idambil){
        $dataambil=AmbilModel::find($idambil);
        $dataambil->delete();
        
        return redirect()->back();
    }
}