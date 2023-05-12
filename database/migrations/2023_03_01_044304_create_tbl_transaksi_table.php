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
        Schema::create('tbl_transaksi', function (Blueprint $table) {
            $table->increments('idtransaksi');
            $table->integer('idanggota')->unsigned();
            $table->foreign('idanggota')
            ->references('idanggota')
            ->on('tbl_anggota')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('idpetugas')->unsigned();
            $table->foreign('idpetugas')
            ->references('idpetugas')
            ->on('tbl_petugas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('total_transaksi');
            $table->string('tgl_transaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_transaksi');
    }
};
