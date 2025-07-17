<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RuangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ruang')->insert([
            ['id' => 1, 'nama' => 'H.6.1', 'kapasitas' => 40, 'kap_ujian' => 40, 'status' => 1],
            ['id' => 2, 'nama' => 'H.6.2', 'kapasitas' => 40, 'kap_ujian' => 40, 'status' => 1],
            ['id' => 3, 'nama' => 'D.2.A', 'kapasitas' => 35, 'kap_ujian' => 35, 'status' => 1],
            ['id' => 4, 'nama' => 'G.1.1', 'kapasitas' => 50, 'kap_ujian' => 50, 'status' => 1],
            ['id' => 5, 'nama' => 'AULA', 'kapasitas' => 200, 'kap_ujian' => 200, 'status' => 1],
        ]);
    }
}
