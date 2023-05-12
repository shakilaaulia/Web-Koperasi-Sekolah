@extends('index')
@section('title', 'Detail Anggota')
@section('halaman', 'Detail Anggota')

@section('isihalaman')
<br>
<div class="container">


<div class="py-2 px-3 text h6" style="background-color: #E8EBED;">
<div class="nav" style="display: flex;justify-content: flex-end;">
<form action="/coba/cari" method="GET">
<div class="input-group input-group-sm" style="width:300px;">
  <input type="text" name="cari" class="form-control rounded float-right"  placeholder="Cari Data Anggota" aria-label="Search" aria-describedby="search-addon" value="{{ old('cari') }}"/>
  <input type="submit" class="btn btn-success float-right" value="Search"/>
</div>
</form>
</div>
</div>

@foreach($anggota as $g)
<div class="rounded shadow-sm bg-body border">
    <div class="py-2 px-3 bg-success text-light h6">
        Data Siswa
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
                        <th scope="row">Jabatan</th>
                        <td>: {{ $g->jabatan }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal Lahir</th>
                        <td>: {{ $g->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jenis Kelamin</th>
                        <td>: {{ $g->jk }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Alamat</th>
                        <td>: {{ $g->alamat }}</td>
                    </tr>
                    <tr>
                        <th scope="row">No Telepon</th>
                        <td>: {{ $g->hp }}</td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>     
    </div>
</div>
<br>
@endforeach
</div>
@endsection