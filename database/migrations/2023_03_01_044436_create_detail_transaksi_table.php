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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->increments('id_detail_transaksi');
            $table->integer('idtransaksi')->unsigned();
            $table->foreign('idtransaksi')
            ->references('idtransaksi')
            ->on('tbl_transaksi')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('idproduk')->unsigned();
            $table->foreign('idproduk')
            ->references('idproduk')
            ->on('tbl_produk')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('jmlh_produk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
