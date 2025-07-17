<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswa_dinus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim_dinus', 50)->unique();
            $table->integer('ta_masuk')->nullable();
            $table->string('prodi', 5)->nullable();
            $table->string('pass_mhs', 128)->nullable();
            $table->integer('kelas')->comment('0=not choose, 1=pagi, 2=malam, 3=karyawan/pegawai');
            $table->char('akdm_stat', 2)->comment('1=aktif, 2=cuti, 3=keluar, 4=lulus, 5=mangkir, 6=meninggal, 7=DO, 8=Aktif Keuangan');
            $table->index('akdm_stat', 'STS_AKD_MHS');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_dinus');
    }
};
