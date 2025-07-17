<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matkul_kurikulum', function (Blueprint $table) {
            $table->integer('kur_id')->nullable();
            $table->string('kdmk', 255)->primary();
            $table->string('nmmk', 255)->nullable();
            $table->string('nmen', 255)->nullable();
            $table->enum('tp', ['T', 'P', 'TP'])->nullable();
            $table->integer('sks')->nullable();
            $table->smallInteger('sks_t')->nullable();
            $table->smallInteger('sks_p')->nullable();
            $table->integer('smt')->nullable();
            $table->integer('jns_smt')->nullable();
            $table->tinyInteger('aktif')->nullable();
            $table->string('kur_nama', 255)->nullable();
            $table->enum('kelompok_makul', ['MPK', 'MKK', 'MKB', 'MKD', 'MBB', 'MPB'])->nullable();
            $table->boolean('kur_aktif')->nullable();
            $table->enum('jenis_matkul', ['wajib', 'pilihan'])->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matkul_kurikulum');
    }
};
