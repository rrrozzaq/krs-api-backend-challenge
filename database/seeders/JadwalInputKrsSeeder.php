<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class JadwalInputKrsSeeder extends Seeder {
    public function run(): void {
        DB::table('jadwal_input_krs')->insert([
            ['ta' => 20241, 'prodi' => 'A11'],
            ['ta' => 20241, 'prodi' => 'A12'],
        ]);
    }
}
