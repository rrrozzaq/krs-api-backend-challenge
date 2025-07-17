<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tagihan_mhs', function (Blueprint $table) {
            $table->foreign('ta')->references('kode')->on('tahun_ajaran');
            $table->foreign('nim_dinus')->references('nim_dinus')->on('mahasiswa_dinus');
        });

        Schema::table('ip_semester', function (Blueprint $table) {
            $table->foreign('ta')->references('kode')->on('tahun_ajaran');
            $table->foreign('nim_dinus')->references('nim_dinus')->on('mahasiswa_dinus');
        });

        Schema::table('jadwal_tawar', function (Blueprint $table) {
            $table->foreign('kdmk')->references('kdmk')->on('matkul_kurikulum');
            $table->foreign('id_hari1')->references('id')->on('hari');
            $table->foreign('id_hari2')->references('id')->on('hari');
            $table->foreign('id_hari3')->references('id')->on('hari');
            $table->foreign('id_sesi1')->references('id')->on('sesi_kuliah');
            $table->foreign('id_sesi2')->references('id')->on('sesi_kuliah');
            $table->foreign('id_sesi3')->references('id')->on('sesi_kuliah');
            $table->foreign('id_ruang1')->references('id')->on('ruang');
            $table->foreign('id_ruang2')->references('id')->on('ruang');
            $table->foreign('id_ruang3')->references('id')->on('ruang');
        });

        Schema::table('krs_record', function (Blueprint $table) {
            $table->foreign('ta')->references('kode')->on('tahun_ajaran');
            $table->foreign('kdmk')->references('kdmk')->on('matkul_kurikulum');
            $table->foreign('id_jadwal')->references('id')->on('jadwal_tawar');
            $table->foreign('nim_dinus')->references('nim_dinus')->on('mahasiswa_dinus');
        });

        Schema::table('krs_record_log', function (Blueprint $table) {
            $table->foreign('id_krs')->references('id')->on('krs_record');
            $table->foreign('nim_dinus')->references('nim_dinus')->on('mahasiswa_dinus');
            $table->foreign('kdmk')->references('kdmk')->on('matkul_kurikulum');
        });

        Schema::table('sesi_kuliah_bentrok', function (Blueprint $table) {
            $table->foreign('id')->references('id')->on('sesi_kuliah')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_bentrok')->references('id')->on('sesi_kuliah')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('mhs_ijin_krs', function (Blueprint $table) {
            $table->foreign('ta')->references('kode')->on('tahun_ajaran');
            $table->foreign('nim_dinus')->references('nim_dinus')->on('mahasiswa_dinus');
        });

        Schema::table('herregist_mahasiswa', function (Blueprint $table) {
            $table->foreign('nim_dinus')->references('nim_dinus')->on('mahasiswa_dinus');
            $table->foreign('ta')->references('kode')->on('tahun_ajaran');
        });

        Schema::table('mhs_dipaketkan', function (Blueprint $table) {
            $table->foreign('nim_dinus')->references('nim_dinus')->on('mahasiswa_dinus');
        });

        Schema::table('daftar_nilai', function (Blueprint $table) {
            $table->foreign('nim_dinus')->references('nim_dinus')->on('mahasiswa_dinus');
            $table->foreign('kdmk')->references('kdmk')->on('matkul_kurikulum');
        });

        Schema::table('validasi_krs_mhs', function (Blueprint $table) {
            $table->foreign('nim_dinus')->references('nim_dinus')->on('mahasiswa_dinus');
            $table->foreign('ta')->references('kode')->on('tahun_ajaran');
        });
    }

    public function down(): void
    {
    }
};
