<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaModel;

class AnggotaController extends Controller
{
    //method untuk tampil data anggota
    public function anggotatampil()
    {
        $dataanggota = AnggotaModel::orderby('nip', 'ASC')
        ->paginate(5);

        return view('halaman/view_anggota',['anggota'=>$dataanggota]);
    }

    //method untuk tambah data anggota
    public function anggotatambah(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'hp' => 'required'
        ]);

        AnggotaModel::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'hp' => $request->hp
        ]);

        return redirect('/anggota');
    }

    //method untuk hapus data anggota
    public function anggotahapus($idanggota)
    {
        $dataanggota=AnggotaModel::find($idanggota);
        $dataanggota->delete();

        return redirect()->back();
    }

    //method untuk edit data anggota
    public function anggotaedit($idanggota, Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'hp' => 'required'
        ]);

        $idanggota = AnggotaModel::find($idanggota);
        $idanggota->nip   = $request->nip;
        $idanggota->nama      = $request->nama;
        $idanggota->jabatan  = $request->jabatan;
        $idanggota->tgl_lahir   = $request->tgl_lahir;
        $idanggota->jk   = $request->jk;
        $idanggota->alamat = $request->alamat;
        $idanggota->hp   = $request->hp;

        $idanggota->save();

        return redirect()->back();
    }

    public function anggotadetail($idanggota)
    {
        $dataanggota=AnggotaModel::find($idanggota);
        return view('halaman/view_detailanggota',['anggota'=>$dataanggota]);
    }
}
