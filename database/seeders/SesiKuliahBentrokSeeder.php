<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SesiKuliahBentrokSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sesi_kuliah_bentrok')->insert([
            ['id' => 10, 'id_bentrok' => 1],
            ['id' => 10, 'id_bentrok' => 2],

            ['id' => 11, 'id_bentrok' => 2],
            ['id' => 11, 'id_bentrok' => 3],
        ]);
    }
}
