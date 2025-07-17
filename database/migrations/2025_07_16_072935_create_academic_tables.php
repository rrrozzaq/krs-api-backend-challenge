<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tagihan_mhs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ta', 10);
            $table->string('nim_dinus', 50);
            $table->string('spp_bank', 11)->nullable();
            $table->integer('spp_bayar')->default(0)->comment('1:bayar, 0:belum');
            $table->dateTime('spp_bayar_date')->nullable();
            $table->integer('spp_dispensasi')->nullable();
            $table->string('spp_host', 25)->nullable();
            $table->integer('spp_status')->comment('1:full payment, 0:dispensasi');
            $table->string('spp_transaksi', 20)->nullable();
            $table->unique(['nim_dinus', 'ta']);
        });

        Schema::create('jadwal_input_krs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ta')->nullable();
            $table->char('prodi', 3)->nullable();
            $table->dateTime('tgl_mulai')->nullable();
            $table->dateTime('tgl_selesai')->nullable();
        });

        Schema::create('ip_semester', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ta', 10);
            $table->string('nim_dinus', 50);
            $table->integer('sks');
            $table->string('ips', 5);
            $table->dateTime('last_update')->nullable();
            $table->unique(['ta', 'nim_dinus'], 'nim');
        });

        Schema::create('sesi_kuliah_bentrok', function (Blueprint $table) {
            $table->unsignedSmallInteger('id');
            $table->unsignedSmallInteger('id_bentrok');
            $table->primary(['id', 'id_bentrok']);
        });

        Schema::create('mhs_ijin_krs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ta', 10)->nullable();
            $table->string('nim_dinus', 50)->nullable();
            $table->tinyInteger('ijinkan')->nullable();
            $table->timestamp('time')->useCurrent();
            $table->unique(['ta', 'nim_dinus'], 'nim');
        });

        Schema::create('herregist_mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim_dinus', 50)->nullable();
            $table->string('ta', 5)->nullable();
            $table->dateTime('date_reg')->nullable();
        });

        Schema::create('mhs_dipaketkan', function (Blueprint $table) {
            $table->string('nim_dinus', 50)->primary();
            $table->integer('ta_masuk_mhs')->nullable();
        });

        Schema::create('daftar_nilai', function (Blueprint $table) {
            $table->increments('_id');
            $table->string('nim_dinus', 50)->nullable();
            $table->string('kdmk', 20)->nullable();
            $table->char('nl', 2)->nullable();
            $table->smallInteger('hide')->default(0)->comment('0:muncul, 1:sembunyi');
            $table->index(['nim_dinus', 'kdmk'], 'nim');
        });

        Schema::create('validasi_krs_mhs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim_dinus', 50);
            $table->dateTime('job_date')->nullable();
            $table->string('job_host', 255)->nullable();
            $table->string('job_agent', 255)->nullable();
            $table->string('ta', 10)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tagihan_mhs');
        Schema::dropIfExists('jadwal_input_krs');
        Schema::dropIfExists('ip_semester');
        Schema::dropIfExists('sesi_kuliah_bentrok');
        Schema::dropIfExists('mhs_ijin_krs');
        Schema::dropIfExists('herregist_mahasiswa');
        Schema::dropIfExists('mhs_dipaketkan');
        Schema::dropIfExists('daftar_nilai');
        Schema::dropIfExists('validasi_krs_mhs');
    }
};
