<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetugasModel;

class PetugasController extends Controller
{
    //method untuk tampil data anggota
    public function petugastampil()
    {
        $datapetugas = PetugasModel::orderby('nama', 'ASC')
        ->paginate(5);

        return view('halaman/view_petugas',['petugas'=>$datapetugas]);
    }

    //method untuk tambah data anggota
    public function petugastambah(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'hp' => 'required'
        ]);

        PetugasModel::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'hp' => $request->hp
        ]);

        return redirect('/petugas');
    }

    //method untuk hapus data anggota
    public function petugashapus($idpetugas)
    {
        $datapetugas=PetugasModel::find($idpetugas);
        $datapetugas->delete();

        return redirect()->back();
    }

    //method untuk edit data anggota
    public function petugasedit($idpetugas, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'hp' => 'required'
        ]);

        $idpetugas = PetugasModel::find($idpetugas);
        $idpetugas->nama      = $request->nama;
        $idpetugas->alamat = $request->alamat;
        $idpetugas->hp   = $request->hp;

        $idpetugas->save();

        return redirect()->back();
    }
}
