<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HerregistMahasiswaSeeder extends Seeder {
    public function run(): void {
        DB::table('herregist_mahasiswa')->insert([
            ['nim_dinus' => 'A11.2022.00001', 'ta' => '20241'],
            ['nim_dinus' => 'A11.2022.00002', 'ta' => '20241'],
            ['nim_dinus' => 'A12.2022.00003', 'ta' => '20241'],
            ['nim_dinus' => 'A11.2021.00004', 'ta' => '20241'],
        ]);
    }
}
