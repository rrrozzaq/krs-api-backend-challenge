<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunAjaranSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tahun_ajaran')->insert([
            ['id' => 1, 'kode' => '20222', 'tahun_awal' => '2022', 'tahun_akhir' => '2023', 'jns_smt' => 2, 'set_aktif' => 0],
            ['id' => 2, 'kode' => '20231', 'tahun_awal' => '2023', 'tahun_akhir' => '2024', 'jns_smt' => 1, 'set_aktif' => 0],
            ['id' => 3, 'kode' => '20232', 'tahun_awal' => '2023', 'tahun_akhir' => '2024', 'jns_smt' => 2, 'set_aktif' => 0],
            ['id' => 4, 'kode' => '20241', 'tahun_awal' => '2024', 'tahun_akhir' => '2025', 'jns_smt' => 1, 'set_aktif' => 1],
            ['id' => 5, 'kode' => '20242', 'tahun_awal' => '2024', 'tahun_akhir' => '2025', 'jns_smt' => 2, 'set_aktif' => 0],
        ]);
    }
}
