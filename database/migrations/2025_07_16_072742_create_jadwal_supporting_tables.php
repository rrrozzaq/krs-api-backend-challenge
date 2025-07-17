<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hari', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->primary();
            $table->string('nama', 6);
            $table->string('nama_en', 20);
        });

        Schema::create('ruang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 250);
            $table->string('nama2', 250)->default('-');
            $table->integer('id_jenis_makul')->nullable();
            $table->string('id_fakultas', 5)->nullable();
            $table->integer('kapasitas')->default(0);
            $table->integer('kap_ujian')->default(0);
            $table->smallInteger('status')->default(1)->comment('1:buka 0:tutup 2:hapus');
            $table->string('luas', 5)->default('0')->comment('meter persegi');
            $table->string('kondisi', 50)->nullable();
            $table->integer('jumlah')->nullable();
        });

        Schema::create('sesi_kuliah', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('jam', 11)->default('');
            $table->smallInteger('sks')->default(0);
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->integer('status')->default(1)->comment('0=tidak valid, 1=jam valid, 2=jam istirahat');
            $table->unique(['jam_mulai', 'jam_selesai'], 'jam_unik');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hari');
        Schema::dropIfExists('ruang');
        Schema::dropIfExists('sesi_kuliah');
    }
};
