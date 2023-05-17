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
            'hp' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nip.required' => 'Nomor Induk wajib diisi',
            'nama.required' => 'Nomor Induk wajib diisi',
            'jabatan.required' => 'Nomor Induk wajib diisi',
            'tgl_lahir.required' => 'Nomor Induk wajib diisi',
            'jk.required' => 'Nomor Induk wajib diisi',
            'alamat.required' => 'Nomor Induk wajib diisi',
            'hp.required' => 'Nomor Induk wajib diisi',
            'file.mimes' => 'Nomor Induk wajib diisi',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        $namafile = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuanupload = 'Gambar';
        $file->move($tujuanupload, $namafile);

        AnggotaModel::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'file' => $namafile
        ]);


        // $foto_file = $request->file('gambar');
        // $foto_ekstensi = $foto_file->extension();
        // $foto_nama = date('ymdhis').".".$foto_ekstensi;
        // $foto_file->move(public_path('foto'), $foto_nama);

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
            'hp' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $idanggota = AnggotaModel::find($idanggota);
        $idanggota->nip   = $request->nip;
        $idanggota->nama      = $request->nama;
        $idanggota->jabatan  = $request->jabatan;
        $idanggota->tgl_lahir   = $request->tgl_lahir;
        $idanggota->jk   = $request->jk;
        $idanggota->alamat = $request->alamat;
        $idanggota->hp   = $request->hp;
        $awal = $idanggota->file;

        $dt = ['file' => $awal];

        $request->file->move(public_path().'/Gambar', $awal);

        $idanggota->update($dt);

        $idanggota->save();

        return redirect()->back();
    }

    public function anggotadetail($idanggota)
    {
        $dataanggota=AnggotaModel::find($idanggota);
        return view('halaman/view_detailanggota',['anggota'=>$dataanggota]);
    }
}
