<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SesiKuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sesi_kuliah')->insert([
            ['id' => 1, 'jam' => '07.00-08.40', 'sks' => 2, 'jam_mulai' => '07:00:00', 'jam_selesai' => '08:40:00', 'status' => 1],
            ['id' => 2, 'jam' => '08.40-10.20', 'sks' => 2, 'jam_mulai' => '08:40:00', 'jam_selesai' => '10:20:00', 'status' => 1],
            ['id' => 3, 'jam' => '10.20-12.00', 'sks' => 2, 'jam_mulai' => '10:20:00', 'jam_selesai' => '12:00:00', 'status' => 1],

            ['id' => 10, 'jam' => '07.00-09.30', 'sks' => 3, 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'status' => 1],
            ['id' => 11, 'jam' => '09.30-11.10', 'sks' => 2, 'jam_mulai' => '09:30:00', 'jam_selesai' => '11:10:00', 'status' => 1],
        ]);
    }
}
