<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_produk', function (Blueprint $table) {
            $table->increments('idproduk');
            $table->string('nama_produk');
            $table->integer('idkategori')->unsigned();
            $table->foreign('idkategori')
            ->references('idkategori')
            ->on('tbl_kategori')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('harga');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_produk');
    }
};
