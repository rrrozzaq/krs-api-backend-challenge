<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class MhsIjinKrsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mhs_ijin_krs')->insert([
            ['ta' => '20241', 'nim_dinus' => 'A11.2021.00005', 'ijinkan' => 1, 'time' => Carbon::now()],
        ]);
    }
}
