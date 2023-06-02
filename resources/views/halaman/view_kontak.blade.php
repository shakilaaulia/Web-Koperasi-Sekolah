@extends('index')
@section('title', 'Kontak Kami')
@section('halaman', 'Kontak Kami')

@section('isihalaman')
<div class="container">
<p>
<div class="rounded shadow-sm bg-body border">
    <div class="py-2 px-3 text-light h6" style="background-color:#65A834;">
        Kirimkan Kritik dan Saran Anda di bawah ini
    </div>
    <div class="p-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <form name="form" id="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="idpetugas" class="col-sm-1 col-form-label">Nama</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap">
                            </div>
                        </div>
                        
                        <p>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-1 col-form-label">Email</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Email">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-1 col-form-label">No HP</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukan No HP">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-1 col-form-label">Pesan</label>
                            <div class="col-sm-11">
                                 <!-- Message input -->
                            <div class="form-outline mb-4">
                                <textarea class="form-control" id="form4Example3" rows="2"></textarea>
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="kirim" class="btn btn-success">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>     
    </div>
</div>

</div>
@endsection