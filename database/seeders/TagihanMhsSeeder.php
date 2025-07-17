<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TagihanMhsSeeder extends Seeder {
    public function run(): void {
        DB::table('tagihan_mhs')->insert([
            ['ta' => 20241, 'nim_dinus' => 'A11.2022.00001', 'spp_bayar' => 1, 'spp_status' => 1],
            ['ta' => 20241, 'nim_dinus' => 'A11.2022.00002', 'spp_bayar' => 1, 'spp_status' => 1],
            ['ta' => 20241, 'nim_dinus' => 'A12.2022.00003', 'spp_bayar' => 1, 'spp_status' => 1],
            ['ta' => 20241, 'nim_dinus' => 'A11.2021.00004', 'spp_bayar' => 1, 'spp_status' => 1],
            ['ta' => 20241, 'nim_dinus' => 'A11.2021.00005', 'spp_bayar' => 0, 'spp_status' => 0],
        ]);
    }
}
