@extends('index')
@section('title', 'Tentang Kami')
@section('halaman', 'Tentang Kami')

@section('isihalaman')
<div class="container">
<p>
<!-- Carousel wrapper -->
<div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
 
  <!-- Inner -->
  <div class="carousel-inner">
    <!-- Single item -->
    <div class="carousel-item active">
      <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(15).webp" class="d-block w-100" alt="Sunset Over the City"/>
      <div class="carousel-caption d-none d-md-block">
        <h5>Selamat Datang</h5>
        <p>Selamat Datang di Web Koperasi Simpan Pinjam khusus warga sekolah SMKN 1 Cimahi.<br> Dengan adanya website ini
    memudahkan dalam transaksi pinjam dan simpan. Transaksi yang berlangsung disimpan secara cepat dan mudah untuk diakses.</p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(22).webp" class="d-block w-100" alt="Canyon at Nigh"/>
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(23).webp" class="d-block w-100" alt="Cliff Above a Stormy Sea"/>
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->
    <!-- <img class="bi me-2" src="{{ asset('image') }}/koperasi.png" width="200" height="200"></img>
    <h3>Koperasi Simpan Pinjam SMKN 1 CIMAHI</h3>
    <p>
    <h4>Selamat Datang</h4>
    Selamat Datang di Web Koperasi Simpan Pinjam khusus warga sekolah SMKN 1 Cimahi. Dengan adanya website ini
    memudahkan dalam transaksi pinjam dan simpan. Transaksi yang berlangsung disimpan secara cepat dan mudah untuk diakses. 
    
    <p>
    <h4>Menurut Lasa HS</h4>
    Menurut Lasa HS, Perpustakaan merupakan kumpulan atau bangunan fisik sebagai tempat buku dikumpulkan dan disusun
    berdasarkan sistem tertentu atau keperluan pengguna. -->

</div>
@endsection