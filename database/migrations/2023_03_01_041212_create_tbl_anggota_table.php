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
        Schema::create('tbl_anggota', function (Blueprint $table) {
            $table->increments('idanggota');
            $table->integer('nip');
            $table->string('nama');
            $table->string('jabatan');
            $table->date('tgl_lahir');
            $table->string('jk');
            $table->text('alamat');
            $table->integer('hp');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_anggota');
    }
};
