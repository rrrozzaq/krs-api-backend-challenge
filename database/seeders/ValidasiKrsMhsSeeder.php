<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ValidasiKrsMhsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('validasi_krs_mhs')->insert([
            ['nim_dinus' => 'A11.2021.00008', 'ta' => 20241],
        ]);
    }
}
