<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('krs_record', function (Blueprint $table) {
            $table->id();
            $table->string('ta', 10);
            $table->string('kdmk', 255);
            $table->unsignedInteger('id_jadwal');
            $table->string('nim_dinus', 50);
            $table->char('sts', 1);
            $table->integer('sks');
            $table->integer('modul')->default(0);
            $table->index('ta', 'PERIODE');
            $table->index('nim_dinus', 'MAHASISWA');
        });

        Schema::create('krs_record_log', function (Blueprint $table) {
            $table->unsignedBigInteger('id_krs')->nullable();
            $table->string('nim_dinus', 50)->nullable();
            $table->string('kdmk', 255)->nullable();
            $table->tinyInteger('aksi')->nullable()->comment('1=insert, 2=delete');
            $table->integer('id_jadwal')->nullable();
            $table->string('ip_addr', 50)->nullable();
            $table->timestamp('lastUpdate')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('krs_record');
        Schema::dropIfExists('krs_record_log');
    }
};
