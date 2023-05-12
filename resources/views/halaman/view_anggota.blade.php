@extends('index')
@section('title', 'Data Anggota')
@section('halaman', 'Data Anggota')

@section('isihalaman')
<div class="container">
<p>
<h3><center>Daftar Anggota  Koperasi SMK Negeri 1 Cimahi</center></h3>

    <br>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAnggotaTambah"> 
        Tambah Data Anggota
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">NIP</td>
                <td align="center">Nama</td>
                <td align="center">Jabatan</td>
                <td align="center">Alamat</td>
                <td align="center">No HP</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($anggota as $index=>$agt)
                <tr>
                    <td align="center" scope="row">{{ $index + $anggota->firstItem() }}</td>
                    <td>{{$agt->nip}}</td>
                    <td>{{$agt->nama}}</td>
                    <td>{{$agt->jabatan}}</td>
                    <td>{{$agt->alamat}}</td>
                    <td>{{$agt->hp}}</td>
                    <td align="center">
                    <a href="/anggota/detail/{{$agt->idanggota}}" class="btn btn-success">
                    
                            Detail
                    </a>
                    |
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalAnggotaEdit{{$agt->idanggota}}"> 
    Edit
</button>

<!-- Awal Modal EDIT data Buku -->
<div class="modal fade" id="modal{{$agt->idanggota}}" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAnggotaEditLabel">Form Edit Data Anggota</h5>
            </div>
            <div class="modal-body">

                <form name="formanggotaedit" id="formanggotaedit" action="/anggota/edit/{{ $agt->idanggota}} " method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label for="idanggota" class="col-sm-4 col-form-label">NIP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nip" name="nip" value="{{ $agt->nip}}">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="judul" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $agt->nama}}">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="pengarang" class="col-sm-4 col-form-label">Jabatan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $agt->jabatan}}">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="penerbit" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $agt->tgl_lahir}}">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="penerbit" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="jk" name="jk" value="{{ $agt->jk}}">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="penerbit" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $agt->alamat}}">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="penerbit" class="col-sm-4 col-form-label">HP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="hp" name="hp" value="{{ $agt->hp}}">
                        </div>
                    </div>

                    <p>
                    <div class="modal-footer">
                        <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="bukutambah" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="anggota/hapus/{{$agt->idanggota}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination -->
    Halaman : {{ $anggota->currentPage() }} <br />
    Jumlah Data : {{ $anggota->total() }} <br />
    Data Per Halaman : {{ $anggota->perPage() }} <br />

    {{ $anggota->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Buku -->
    <div class="modal fade" id="modalAnggotaTambah" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAnggotaTambahLabel">Form Input Data Anggota</h5>
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
                            <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukan Jabatan">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="tgl_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jk" name="jk" placeholder="Masukan Jenis Kelamin">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-4 col-form-label">No HP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukan No HP">
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
    <!-- Akhir Modal tambah data buku -->

    </div>

    @endsection