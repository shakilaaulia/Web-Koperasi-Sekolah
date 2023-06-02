<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route Login
Route::get('/', 'LoginController@login')->name('login');
Route::post('loginaksi', 'LoginController@loginaksi')->name('loginaksi');

Route::get('/sidebar', 'SidebarController@sidebar')->name('sidebar');

Route::middleware('auth')->group(function(){
    Route::get('logoutaksi', 'LoginController@logoutaksi')->name('logoutaksi');
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('kontak', 'HomeController@kontak');

    //Route untuk Data Anggota
    Route::get('/anggota', 'AnggotaController@anggotatampil');
    Route::post('/anggota/tambah','AnggotaController@anggotatambah');
    Route::get('/anggota/hapus/{idanggota}','AnggotaController@anggotahapus');
    Route::put('/anggota/edit/{idanggota}', 'AnggotaController@anggotaedit');
    Route::get('/anggota/detail/{idanggota}', 'AnggotaController@anggotadetail');

    //Route untuk Data Petugas
    Route::get('/petugas', 'PetugasController@petugastampil');
    Route::post('/petugas/tambah','PetugasController@petugastambah');
    Route::get('/petugas/hapus/{idpetugas}','PetugasController@petugashapus');
    Route::put('/petugas/edit/{idpetugas}', 'PetugasController@petugasedit');
    
    //Route untuk Data Simpan
    Route::get('/simpan', 'SimpanController@simpantampil');
    Route::post('/simpan/tambah','SimpanController@simpantambah');
    Route::get('/simpan/hapus/{idsimpan}','SimpanController@simpanhapus');
    Route::put('/simpan/edit/{idsimpan}', 'SimpanController@simpanedit');

     //Route untuk Data Pinjam
     Route::get('/pinjam', 'PinjamController@pinjamtampil');
     Route::post('/pinjam/tambah','PinjamController@pinjamtambah');
     Route::get('/pinjam/hapus/{idpinjam}','PinjamController@pinjamhapus');
     Route::put('/pinjam/edit/{idpinjam}', 'PinjamController@pinjamedit');
 
     //Route untuk Data Pembayaran
     Route::post('/bayar/tambah','BayarController@bayartambah');
     Route::get('/bayar/hapus/{idbayar}','BayarController@bayarhapus');

     //Route untuk Data Pengambilan
     Route::post('/ambil/tambah','AmbilController@ambiltambah');
     Route::get('/ambil/hapus/{idambil}','AmbilController@ambilhapus');

    Route::get('/coba', 'PinjamController@tampil');
    Route::get('/coba/cari','PinjamController@cari');

});


