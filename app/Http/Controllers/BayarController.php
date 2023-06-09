<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BayarModel;
use Carbon\Carbon;

class BayarController extends Controller
{
    public function bayartambah(Request $request){
        $this->validate($request, [
            'anggota' => 'required',
            'petugas' => 'required',
            'jmlh_bayar' => 'required'
        ]);

        BayarModel::create([
            'idanggota' => $request->anggota,
            'idpetugas' => $request->petugas, 
            'jmlh_bayar' => $request->jmlh_bayar,
            'tgl_bayar' => Carbon::now(),
        ]);

        return redirect()->back();
    }

    public function bayarhapus($idbayar){
        $databayar=BayarModel::find($idbayar);
        $databayar->delete();
        
        return redirect()->back();
    }
}