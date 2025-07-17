<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('jadwal_tawar', function (Blueprint $table) {
        $table->increments('id');
        $table->string('ta', 10);
        $table->string('kdmk', 15);
        $table->string('klpk', 15);
        $table->string('klpk_2', 15)->nullable();
        $table->integer('kdds');
        $table->integer('kdds2')->nullable();
        $table->integer('jmax')->default(0);
        $table->integer('jsisa')->default(0);

        $table->unsignedTinyInteger('id_hari1');
        $table->unsignedTinyInteger('id_hari2');
        $table->unsignedTinyInteger('id_hari3');

        $table->unsignedSmallInteger('id_sesi1');
        $table->unsignedSmallInteger('id_sesi2');
        $table->unsignedSmallInteger('id_sesi3');

        $table->unsignedInteger('id_ruang1');
        $table->unsignedInteger('id_ruang2');
        $table->unsignedInteger('id_ruang3');

        $table->tinyInteger('jns_jam')->comment('1=pagi, 2=malam, 3=pagi-malam');
        $table->tinyInteger('open_class')->default(1)->comment('1=open; 0=close');
    });
}

    public function down(): void
    {
        Schema::dropIfExists('jadwal_tawar');
    }
};
