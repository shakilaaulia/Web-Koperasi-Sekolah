@extends('index')
@section('title', 'Data Petugas')
@section('halaman', 'Data Petugas')

@section('isihalaman')
<div class="container">
<p>

    <br>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPetugasTambah"> 
        Tambah Data Petugas
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">Nama</td>
                <td align="center">Alamat</td>
                <td align="center">No HP</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($petugas as $index=>$ptgs)
                <tr>
                    <td align="center" scope="row">{{ $index + $petugas->firstItem() }}</td>
                    <td>{{$ptgs->nama}}</td>
                    <td>{{$ptgs->alamat}}</td>
                    <td>{{$ptgs->hp}}</td>
                    <td align="center">
                        
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalPetugasEdit{{$ptgs->idpetugas}}"> 
                        Edit
                    </button>

<!-- Awal Modal EDIT data Buku -->
<div class="modal fade" id="modalPetugasEdit{{$ptgs->idpetugas}}" tabindex="-1" role="dialog" aria-labelledby="modalPetugasEditLabel" aria-hidden="true">
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

    <!--awal pagination -->
    Halaman : {{ $petugas->currentPage() }} <br />
    Jumlah Data : {{ $petugas->total() }} <br />
    Data Per Halaman : {{ $petugas->perPage() }} <br />

    {{ $petugas->links() }}
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