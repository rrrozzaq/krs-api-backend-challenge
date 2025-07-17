<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class IpSemesterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ip_semester')->insert([
            ['ta' => 20232, 'nim_dinus' => 'A11.2022.00001', 'sks' => 21, 'ips' => '3.75'],
            ['ta' => 20232, 'nim_dinus' => 'A11.2022.00002', 'sks' => 18, 'ips' => '3.10'],
            ['ta' => 20232, 'nim_dinus' => 'A12.2022.00003', 'sks' => 20, 'ips' => '3.50'],
            ['ta' => 20232, 'nim_dinus' => 'A11.2021.00004', 'sks' => 22, 'ips' => '3.88'],
            ['ta' => 20232, 'nim_dinus' => 'A11.2021.00005', 'sks' => 0, 'ips' => '0.00'],
        ]);
    }
}
