@extends('index')
@section('title', 'Peminjaman')
@section('halaman', 'Data Peminjaman')

@section('isihalaman')
<div class="container">
<p>
<h3><center>Peminjaman Uang Koperasi SMK Negeri 1 Cimahi</center></h3>

    <br>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pinjam</td>
                <td align="center">Nama</td>
                <td align="center">Tanggal Peminjaman</td>
                <td align="center">Total Pinjaman</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pinjam as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $pinjam->firstItem() }}</td>
                    <td align="center">{{$p->idpinjam}}</td>
                    <td>{{$p->anggota->nama}}</td>
                    <td>{{$p->pinjam->tgl_pinjam}}</td>
                    <td>{{$p->pinjam->jmlh_pinjam}}</td>
                    <td align="center">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalPetugasPinjam{{$p->idpinjam}}"> 
                        Pinjam
                    </button>

<!-- Awal Modal pinjam data Buku -->
<div class="modal fade" id="modal{{$p->idpinjam}}" tabindex="-1" role="dialog" aria-labelledby="modalPetugasEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPetugasEditLabel">Form Edit Data Petugas</h5>
            </div>
            <div class="modal-body">

                <form name="formpetugasedit" id="formpetugasedit" action="/petugas/edit/{{ $ptgs->idpetugas}} " method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label for="idpetugas" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $ptgs->nama}}">
                        </div>
                    </div>                

                    <p>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $ptgs->alamat}}">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="hp" class="col-sm-4 col-form-label">HP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="hp" name="hp" value="{{ $ptgs->hp}}">
                        </div>
                    </div>

                    <p>
                    <div class="modal-footer">
                        <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="petugastambah" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="petugas/hapus/{{$ptgs->idpetugas}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $pinjam->currentPage() }} <br />
    Jumlah Data : {{ $pinjam->total() }} <br />
    Data Per Halaman : {{ $pinjam->perPage() }} <br />

    {{ $pinjam->links() }}
    <!--akhir pagination-->
    

    <!-- Awal Modal tambah data Buku -->
    <div class="modal fade" id="modalPetugasTambah" tabindex="-1" role="dialog" aria-labelledby="modalPetugasTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPetugasTambahLabel">Form Input Data Petugas</h5>
                </div>
                <div class="modal-body">

                    <form name="formpetugastambah" id="formpetugastambah" action="/petugas/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="idpetugas" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap">
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