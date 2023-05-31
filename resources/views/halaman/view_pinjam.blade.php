@extends('index')
@section('title', 'Peminjaman')
@section('halaman', 'Data Peminjaman')

@section('isihalaman')
<br>
<div class="container">

<div class="py-2 px-3 text h6" style="background-color: #E8EBED;">
<div class="nav d-flex justify-content-between">
Daftar Anggota
<form class="d-flex" action="/coba/cari" method="GET">
<div class="input-group input-group-sm " style="width:300px;display:flex-end">
  <input type="text" name="cari" class="form-control rounded float-right"  placeholder="Cari Data Anggota" aria-label="Search" aria-describedby="search-addon" value="{{ old('cari') }}"/>
  <input type="submit" class="btn btn-success float-right" value="Search"/>
</div>
</form>
</div>
</div>

@foreach($anggota as $g)
<div class="rounded shadow-sm bg-body border">
    <div class="py-2 px-3 bg-success text-light h6">
        Data Anggota
    </div>
    <div class="p-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th scope="row">NIP</th>
                        <td>: {{ $g->nip }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama</th>
                        <td>: {{ $g->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Total Pinjaman</th>
                        <td>: {{ $g->pinjaman }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Foto</th>
                        <td>: <img style="max-width:50px;max-height:50px" src="{{ url('/Gambar/' . $g->file) }}"></td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAnggotaPinjam">
                    Pinjam
                </button>
                

<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAnggotaBayar"> 
    Bayar
</button>
                </div>
                
            </div>
        </div> 
            
    </div>
</div>

<br>
@endforeach
{{ $anggota->links() }}
<!-- Awal Modal tambah data Buku -->
<div class="modal fade" id="modalAnggotaPinjam" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAnggotaTambahLabel">Form Input Peminjaman</h5>
                </div>
                <div class="modal-body">

                    <form name="formanggotatambah" id="formanggotatambah" action="/anggota/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="idanggota" class="col-sm-4 col-form-label">NIP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukan NIP">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Petugas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Petugas">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="tgl_lahir" class="col-sm-4 col-form-label">Tanggal Pinjam</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" placeholder="Masukan Tanggal">
                            </div>
                        </div>

                    <p>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Jumlah Pinjaman</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="jmlh_pinjam" name="jmlh_pinjam" placeholder="Masukan Nama Lengkap">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="bukutambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Pinjam -->

    <!-- Awal Modal Bayar -->
<div class="modal fade" id="modalAnggotaBayar" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaBayarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAnggotaBayarLabel">Form Input Pembayaran</h5>
                </div>
                <div class="modal-body">

                    <form name="formanggotatambah" id="formanggotatambah" action="/anggota/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="idanggota" class="col-sm-4 col-form-label">NIP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukan NIP">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Petugas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Petugas">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="tgl_lahir" class="col-sm-4 col-form-label">Tanggal Bayar</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" placeholder="Masukan Tanggal">
                            </div>
                        </div>

                    <p>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Jumlah Bayar</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="jmlh_pinjam" name="jmlh_pinjam" placeholder="Masukan Nama Lengkap">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="bukutambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Bayar-->

</div>
@endsection