<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class JadwalTawarSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jadwal_tawar')->insert([
            // Jadwal untuk Semester Aktif 20241
            ['id'=>1, 'ta'=>20241, 'kdmk'=>'A11.003', 'klpk'=>'A11.4201', 'kdds'=>1, 'jmax'=>40, 'jsisa'=>38, 'id_hari1'=>1, 'id_sesi1'=>1, 'id_ruang1'=>1, 'jns_jam'=>1, 'open_class'=>1, 'id_hari2'=>0,'id_sesi2'=>0,'id_ruang2'=>0,'id_hari3'=>0,'id_sesi3'=>0,'id_ruang3'=>0],
            ['id'=>2, 'ta'=>20241, 'kdmk'=>'A11.004', 'klpk'=>'A11.4301', 'kdds'=>2, 'jmax'=>40, 'jsisa'=>40, 'id_hari1'=>2, 'id_sesi1'=>2, 'id_ruang1'=>1, 'jns_jam'=>1, 'open_class'=>1, 'id_hari2'=>0,'id_sesi2'=>0,'id_ruang2'=>0,'id_hari3'=>0,'id_sesi3'=>0,'id_ruang3'=>0],
            ['id'=>3, 'ta'=>20241, 'kdmk'=>'A11.005', 'klpk'=>'A11.4202', 'kdds'=>3, 'jmax'=>40, 'jsisa'=>39, 'id_hari1'=>3, 'id_sesi1'=>3, 'id_ruang1'=>2, 'jns_jam'=>1, 'open_class'=>1, 'id_hari2'=>0,'id_sesi2'=>0,'id_ruang2'=>0,'id_hari3'=>0,'id_sesi3'=>0,'id_ruang3'=>0],
            ['id'=>4, 'ta'=>20241, 'kdmk'=>'A12.002', 'klpk'=>'A12.4201', 'kdds'=>4, 'jmax'=>40, 'jsisa'=>40, 'id_hari1'=>4, 'id_sesi1'=>1, 'id_ruang1'=>3, 'jns_jam'=>1, 'open_class'=>1, 'id_hari2'=>0,'id_sesi2'=>0,'id_ruang2'=>0,'id_hari3'=>0,'id_sesi3'=>0,'id_ruang3'=>0],
            ['id'=>5, 'ta'=>20241, 'kdmk'=>'A11.006', 'klpk'=>'A11.4401', 'kdds'=>2, 'jmax'=>2,  'jsisa'=>2,  'id_hari1'=>1, 'id_sesi1'=>3, 'id_ruang1'=>3, 'jns_jam'=>1, 'open_class'=>1, 'id_hari2'=>0,'id_sesi2'=>0,'id_ruang2'=>0,'id_hari3'=>0,'id_sesi3'=>0,'id_ruang3'=>0],
            ['id'=>6, 'ta'=>20241, 'kdmk'=>'A11.007', 'klpk'=>'A11.4501', 'kdds'=>3, 'jmax'=>1,  'jsisa'=>0,  'id_hari1'=>5, 'id_sesi1'=>1, 'id_ruang1'=>2, 'jns_jam'=>1, 'open_class'=>1, 'id_hari2'=>0,'id_sesi2'=>0,'id_ruang2'=>0,'id_hari3'=>0,'id_sesi3'=>0,'id_ruang3'=>0], // Jadwal kelas penuh
        ]);
    }
}
