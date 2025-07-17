<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulKurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matkul_kurikulum')->insert([
            // Prodi A11 - Teknik Informatika
            ['kdmk' => 'A11.001', 'nmmk' => 'Dasar Pemrograman', 'sks' => 4, 'smt' => 1, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'A11.002', 'nmmk' => 'Kalkulus 1', 'sks' => 3, 'smt' => 1, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'A11.003', 'nmmk' => 'Basis Data', 'sks' => 4, 'smt' => 2, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'A11.004', 'nmmk' => 'Jaringan Komputer', 'sks' => 3, 'smt' => 3, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'A11.005', 'nmmk' => 'Struktur Data', 'sks' => 3, 'smt' => 2, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'A11.006', 'nmmk' => 'Sistem Operasi', 'sks' => 3, 'smt' => 4, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'A11.007', 'nmmk' => 'Kecerdasan Buatan', 'sks' => 3, 'smt' => 5, 'jenis_matkul' => 'pilihan'],
            ['kdmk' => 'A11.008', 'nmmk' => 'Pemrograman Berorientasi Objek', 'sks' => 4, 'smt' => 3, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'A11.009', 'nmmk' => 'Rekayasa Perangkat Lunak', 'sks' => 3, 'smt' => 5, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'A11.010', 'nmmk' => 'Pemrograman Web', 'sks' => 4, 'smt' => 4, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'A11.011', 'nmmk' => 'Keamanan Informasi', 'sks' => 3, 'smt' => 6, 'jenis_matkul' => 'pilihan'],

            // Prodi A12 - Sistem Informasi
            ['kdmk' => 'A12.001', 'nmmk' => 'Manajemen Dasar', 'sks' => 3, 'smt' => 1, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'A12.002', 'nmmk' => 'Akuntansi Biaya', 'sks' => 3, 'smt' => 2, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'A12.003', 'nmmk' => 'Analisis Proses Bisnis', 'sks' => 3, 'smt' => 3, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'A12.004', 'nmmk' => 'Manajemen Proyek TI', 'sks' => 3, 'smt' => 5, 'jenis_matkul' => 'wajib'],

            // Prodi D11 - Kesehatan Masyarakat
            ['kdmk' => 'D11.001', 'nmmk' => 'Anatomi & Fisiologi', 'sks' => 4, 'smt' => 1, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'D11.002', 'nmmk' => 'Epidemiologi Dasar', 'sks' => 3, 'smt' => 2, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'D11.003', 'nmmk' => 'Biostatistik', 'sks' => 3, 'smt' => 3, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'D11.004', 'nmmk' => 'Promosi Kesehatan', 'sks' => 2, 'smt' => 4, 'jenis_matkul' => 'wajib'],

            // Prodi A14 - Desain Komunikasi Visual
            ['kdmk' => 'A14.001', 'nmmk' => 'Nirmana 2D', 'sks' => 3, 'smt' => 1, 'jenis_matkul' => 'wajib'],
            ['kdmk' => 'A14.002', 'nmmk' => 'Tipografi Dasar', 'sks' => 3, 'smt' => 2, 'jenis_matkul' => 'wajib'],
        ]);
    }
}
