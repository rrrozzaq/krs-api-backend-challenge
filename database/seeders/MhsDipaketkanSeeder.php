<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MhsDipaketkanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mhs_dipaketkan')->insert([
            ['nim_dinus' => 'A11.2022.00002', 'ta_masuk_mhs' => 20221],
        ]);
    }
}
