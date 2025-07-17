<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HariSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hari')->insert([
            ['id' => 1, 'nama' => 'SENIN', 'nama_en' => 'MONDAY'],
            ['id' => 2, 'nama' => 'SELASA', 'nama_en' => 'TUESDAY'],
            ['id' => 3, 'nama' => 'RABU', 'nama_en' => 'WEDNESDAY'],
            ['id' => 4, 'nama' => 'KAMIS', 'nama_en' => 'THURSDAY'],
            ['id' => 5, 'nama' => 'JUMAT', 'nama_en' => 'FRIDAY'],
        ]);
    }
}
