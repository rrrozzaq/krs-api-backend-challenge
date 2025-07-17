<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaDinusSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make('123456');
        DB::table('mahasiswa_dinus')->insert([
            // PERBAIKAN: Menambahkan 'kelas' => 1 pada setiap baris
            ['nim_dinus' => 'A11.2022.00001', 'prodi' => 'A11', 'akdm_stat' => '1', 'kelas' => 1, 'pass_mhs' => $password],
            ['nim_dinus' => 'A11.2022.00002', 'prodi' => 'A11', 'akdm_stat' => '1', 'kelas' => 1, 'pass_mhs' => $password],
            ['nim_dinus' => 'A11.2022.00003', 'prodi' => 'A11', 'akdm_stat' => '1', 'kelas' => 1, 'pass_mhs' => $password],
            ['nim_dinus' => 'A12.2022.00004', 'prodi' => 'A12', 'akdm_stat' => '1', 'kelas' => 1, 'pass_mhs' => $password],
            ['nim_dinus' => 'A12.2022.00005', 'prodi' => 'A12', 'akdm_stat' => '1', 'kelas' => 1, 'pass_mhs' => $password],
            ['nim_dinus' => 'D11.2021.00006', 'prodi' => 'D11', 'akdm_stat' => '1', 'kelas' => 1, 'pass_mhs' => $password],
            ['nim_dinus' => 'A11.2021.00007', 'prodi' => 'A11', 'akdm_stat' => '1', 'kelas' => 1, 'pass_mhs' => $password],
            ['nim_dinus' => 'A11.2021.00008', 'prodi' => 'A11', 'akdm_stat' => '1', 'kelas' => 1, 'pass_mhs' => $password],
            ['nim_dinus' => 'A11.2021.00009', 'prodi' => 'A11', 'akdm_stat' => '1', 'kelas' => 1, 'pass_mhs' => $password],
            ['nim_dinus' => 'A11.2021.00010', 'prodi' => 'A11', 'akdm_stat' => '1', 'kelas' => 1, 'pass_mhs' => $password],
        ]);
    }
}
