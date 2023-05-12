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
        Schema::create('tbl_pinjam', function (Blueprint $table) {
            $table->increments('idpinjam');
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
            $table->integer('jmlh_pinjam');
            $table->date('tgl_pinjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pinjam');
    }
};
