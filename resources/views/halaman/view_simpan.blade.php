@extends('index')
@section('title', 'Simpanan')
@section('halaman', 'Data Simpanan')

@section('isihalaman')
<div class="container">
<p>
<h3><center>Simpanan Uang Koperasi SMK Negeri 1 Cimahi</center></h3>

    <br>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSimpanTambah"> 
        Tambah Data Simpanan
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Simpan</td>
                <td align="center">Nama Anggota</td>
                <td align="center">Nama Petugas</td>
                <td align="center">Jenis</td>
                <td align="center">Tanggal Bayar</td>
                <td align="center">Total Bayar</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($simpan as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $simpan->firstItem() }}</td>
                    <td align="center">{{$p->idsimpan}}</td>
                    <td>{{$p->anggota->nama}}</td>
                    <td>{{$p->petugas->nama}}</td>
                    <td>{{$p->jenisSimpan->jenis_simpan}}</td>
                    <td>{{$p->tgl_bayar}}</td>
                    <td>{{$p->jmlh_bayar}}</td>
                    <td align="center">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{$p->idsimpan}}"> 
                        Simpan
                    </button>

<!-- Awal Modal simpan data Buku -->
<div class="modal fade" id="modalEdit{{$p->idsimpan}}" tabindex="-1" role="dialog" aria-labelledby="modalPetugasEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPetugasEditLabel">Form Edit Data Peminjaman</h5>
            </div>
            <div class="modal-body">

                <form name="formpetugasedit" id="formpetugasedit" action="/simpan/edit/{{ $p->idsimpan}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label for="idpeminjaman" class="col-sm-4 col-form-label">Nama Anggota</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="anggota">
                                <option disabled>Pilih Anggota</option>
                                @foreach ($anggota as $agt)
                                    <option value="{{ $agt->idanggota }}" @if($p->idanggota == $agt->idanggota) selected @endif>{{ $agt->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <p>
                    <div class="form-group row">
                        <label for="idpeminjaman" class="col-sm-4 col-form-label">Nama Petugas</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="petugas">
                                <option disabled>Pilih Petugas</option>
                                @foreach ($petugas as $ptg)
                                    <option value="{{ $ptg->idpetugas }}" @if($p->idpetugas == $ptg->idpetugas) selected @endif>{{ $ptg->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="idpeminjaman" class="col-sm-4 col-form-label">Jenis Simpan</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="jenis_simpan">
                                <option selected disabled>Pilih Jenis Simpan</option>
                                @foreach ($jenis_simpan as $jns)
                                    <option value="{{ $jns->idjenis }}" @if($p->jenis_simpan == $jns->idjenis) selected @endif>{{ $jns->jenis_simpan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <p>
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Bayar</label>
                        <div class="col-sm-8">
                            <input value="{{ $p->jmlh_bayar }}" type="number" class="form-control" id="jumlah" name="jmlh_bayar" placeholder="Masukan Jumlah simpan">
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
                        <a href="simpan/hapus/{{$p->idsimpan}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $simpan->currentPage() }} <br />
    Jumlah Data : {{ $simpan->total() }} <br />
    Data Per Halaman : {{ $simpan->perPage() }} <br />

    {{ $simpan->links() }}
    <!--akhir pagination-->
    

    <!-- Awal Modal tambah data Buku -->
    <div class="modal fade" id="modalSimpanTambah" tabindex="-1" role="dialog" aria-labelledby="modalPeminjamanTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPeminjamanTambahLabel">Form Input Data Peminjaman</h5>
                </div>
                <div class="modal-body">

                    <form name="formpeminjamantambah" id="formpeminjamantambah" action="/simpan/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="idpeminjaman" class="col-sm-4 col-form-label">Nama Anggota</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="anggota">
                                    <option selected disabled>Pilih Anggota</option>
                                    @foreach ($anggota as $agt)
                                        <option value="{{ $agt->idanggota }}">{{ $agt->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <p>
                        <div class="form-group row">
                            <label for="idpeminjaman" class="col-sm-4 col-form-label">Nama Petugas</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="petugas">
                                    <option selected disabled>Pilih Petugas</option>
                                    @foreach ($petugas as $ptg)
                                        <option value="{{ $ptg->idpetugas }}">{{ $ptg->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="idpeminjaman" class="col-sm-4 col-form-label">Jenis Simpan</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="jenis_simpan">
                                    <option selected disabled>Pilih Jenis Simpan</option>
                                    @foreach ($jenis_simpan as $jns)
                                        <option value="{{ $jns->idjenis }}">{{ $jns->jenis_simpan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <p>
                        <div class="form-group row">
                            <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Bayar</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="jumlah" name="jmlh_bayar" placeholder="Masukan Jumlah simpan">
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