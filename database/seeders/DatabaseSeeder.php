<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->command->info('Truncating tables...');
        DB::table('krs_record_log')->truncate();
        DB::table('validasi_krs_mhs')->truncate();
        DB::table('tagihan_mhs')->truncate();
        DB::table('mhs_ijin_krs')->truncate();
        DB::table('mhs_dipaketkan')->truncate();
        DB::table('krs_record')->truncate();
        DB::table('daftar_nilai')->truncate();
        DB::table('ip_semester')->truncate();
        DB::table('jadwal_tawar')->truncate();
        DB::table('herregist_mahasiswa')->truncate();
        DB::table('jadwal_input_krs')->truncate();
        DB::table('sesi_kuliah_bentrok')->truncate();
        DB::table('mahasiswa_dinus')->truncate();
        DB::table('matkul_kurikulum')->truncate();
        DB::table('tahun_ajaran')->truncate();
        DB::table('hari')->truncate();
        DB::table('ruang')->truncate();
        DB::table('sesi_kuliah')->truncate();

        $this->command->info('Running seeders...');
        $this->call([
            HariSeeder::class,
            RuangSeeder::class,
            SesiKuliahSeeder::class,
            TahunAjaranSeeder::class,

            MatkulKurikulumSeeder::class,
            MahasiswaDinusSeeder::class,

            SesiKuliahBentrokSeeder::class,
            MhsDipaketkanSeeder::class,
            MhsIjinKrsSeeder::class,
            JadwalTawarSeeder::class,
            DaftarNilaiSeeder::class,
            IpSemesterSeeder::class,
            HerregistMahasiswaSeeder::class,
            TagihanMhsSeeder::class,
            ValidasiKrsMhsSeeder::class,
            JadwalInputKrsSeeder::class,

            KrsRecordSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
        $this->command->info('Database seeding completed successfully.');
    }
}
