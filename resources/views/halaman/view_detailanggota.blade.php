@extends('index')
@section('title', 'Detail Anggota')
@section('halaman', 'Detail Anggota')

@section('isihalaman')
<div class="container">
<p>
    <h3><center>Detail Anggota  Koperasi SMK Negeri 1 Cimahi</center></h3>
    <p>
    <table class="table">
        <tr>
            <th>NIP</th>
            <th>:</th>
            <th>{{$anggota->nip}}</th>
        </tr>

        <tr>
            <th>Nama</th>
            <th>:</th>
            <th>{{$anggota->nama}}</th>
        </tr>

        <tr>
            <th>NIP</th>
            <th>:</th>
            <th>{{$anggota->nip}}</th>
        </tr>

        <tr>
            <th>Jabatan</th>
            <th>:</th>
            <th>{{$anggota->jabatan}}</th>
        </tr>

        <tr>
            <th>Tanggal Lahir</th>
            <th>:</th>
            <th>{{$anggota->tgl_lahir}}</th>
        </tr>

        <tr>
            <th>Jenis Kelamin</th>
            <th>:</th>
            <th>{{$anggota->jk}}</th>
        </tr>

        <tr>
            <th>Alamat</th>
            <th>:</th>
            <th>{{$anggota->alamat}}</th>
        </tr>

        <tr>
            <th>HP</th>
            <th>:</th>
            <th>{{$anggota->hp}}</th>
        </tr>
    </table>
</div>
@endsection