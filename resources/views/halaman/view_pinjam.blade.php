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
               
                </div>
            </div>
        </div>     
    </div>
</div>
<br>
@endforeach
{{ $anggota->links() }}
</div>
@endsection