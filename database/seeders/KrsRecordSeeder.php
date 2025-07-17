<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KrsRecordSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('krs_record')->insert([
            ['ta' => '20241', 'kdmk' => 'A11.003', 'id_jadwal' => 1, 'nim_dinus' => 'A11.2022.00001', 'sts' => 'B', 'sks' => 4], // Senin, sesi 1
            ['ta' => '20241', 'kdmk' => 'A11.005', 'id_jadwal' => 3, 'nim_dinus' => 'A11.2022.00001', 'sts' => 'B', 'sks' => 3], // Rabu, sesi 3
            ['ta' => '20241', 'kdmk' => 'A11.003', 'id_jadwal' => 1, 'nim_dinus' => 'A11.2022.00002', 'sts' => 'B', 'sks' => 4],
        ]);
    }
}
