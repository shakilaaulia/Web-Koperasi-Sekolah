@extends('index')
@section('title', 'Peminjaman')
@section('halaman', 'Data Peminjaman')

@section('isihalaman')
<div class="container">
<p>
<h3><center>Peminjaman Uang Koperasi SMK Negeri 1 Cimahi</center></h3>

    <br>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPinjamTambah"> 
        Tambah Data Peminjaman
    </button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBayarTambah"> 
        Tambah Data Pembayaran
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">Nama Anggota</td>
                {{-- <td align="center">Nama Petugas</td> --}}
                {{-- <td align="center">Tanggal Peminjaman</td> --}}
                <td align="center">Total Pinjaman</td>
                <td align="center"></td>
            </tr>
        </thead>

        <tbody>
            @foreach ($anggota as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $pinjam->firstItem() }}</td>
                    <td>{{$p->nama}}</td>
                    {{-- <td>{{$p->petugas->nama}}</td> --}}
                    {{-- <td>
                        {{$p->pinjam->last()}}
                    </td> --}}
                    <td>
                        {{$p->totalPinjam()}} 
                    </td>
                    <td align="center">

<!-- Awal Modal pinjam data Buku -->
<div class="modal fade" id="modalEdit{{$p->idpinjam}}" tabindex="-1" role="dialog" aria-labelledby="modalPetugasEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPetugasEditLabel">Data Peminjaman {{ $p->nama }}</h5>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>Nama Petugas</td>
                            <td>Tanggal</td>
                            <td>Jumlah</td>
                            <td>Tipe</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($p->transaksiPinjam() as $t)
                            <tr>
                                <td>{{$t->petugas->nama}}</td>
                                @if($t->idpinjam)
                                    <td>{{$t->tgl_pinjam}}</td>
                                    <td>{{$t->jmlh_pinjam}}</td>
                                    <td>Pinjam</td>
                                    <td>
                                        <a href="pinjam/hapus/{{$t->idpinjam}}" onclick="return confirm('Yakin mau dihapus?')">
                                            <button class="btn btn-danger">
                                                x
                                            </button>
                                        </a>
                                    </td>
                                @else
                                    <td>{{$t->tgl_bayar}}</td>
                                    <td>{{$t->jmlh_bayar}}</td>
                                    <td>Bayar</td>
                                    <td>
                                        <a href="bayar/hapus/{{$t->idbayar}}" onclick="return confirm('Yakin mau dihapus?')">
                                            <button class="btn btn-danger">
                                                x
                                            </button>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal EDIT data buku -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEdit{{$p->idpinjam}}"> 
                            Detail
                        </button>
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
    <div class="modal fade" id="modalPinjamTambah" tabindex="-1" role="dialog" aria-labelledby="modalPeminjamanTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPeminjamanTambahLabel">Form Input Data Peminjaman</h5>
                </div>
                <div class="modal-body">

                    <form name="formpeminjamantambah" id="formpeminjamantambah" action="/pinjam/tambah " method="post" enctype="multipart/form-data">
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
                            <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Pinjam</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="jumlah" name="jmlh_pinjam" placeholder="Masukan Jumlah Pinjam">
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
    <div class="modal fade" id="modalBayarTambah" tabindex="-1" role="dialog" aria-labelledby="modalPembayaranTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPembayaranTambahLabel">Form Input Data Pembayaran</h5>
                </div>
                <div class="modal-body">

                    <form name="formpembayarantambah" id="formpembayarantambah" action="/bayar/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="idpembayaran" class="col-sm-4 col-form-label">Nama Anggota</label>
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
                            <label for="idpembayaran" class="col-sm-4 col-form-label">Nama Petugas</label>
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
                            <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Bayar</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="jumlah" name="jmlh_bayar" placeholder="Masukan Jumlah Bayar">
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