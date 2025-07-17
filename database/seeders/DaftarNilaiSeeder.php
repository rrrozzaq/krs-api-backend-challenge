<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DaftarNilaiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('daftar_nilai')->insert([
            ['nim_dinus' => 'A11.2021.00007', 'kdmk' => 'A11.001', 'nl' => 'A'],
            ['nim_dinus' => 'A11.2021.00007', 'kdmk' => 'A11.002', 'nl' => 'C'],
        ]);
    }
}
