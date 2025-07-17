<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class MahasiswaDinus extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'mahasiswa_dinus';
    protected $primaryKey = 'nim_dinus';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'nim_dinus',
        'ta_masuk',
        'prodi',
        'pass_mhs',
        'kelas',
        'akdm_stat',
    ];

    protected $hidden = [
        'pass_mhs',
    ];

    /**
     * Relasi ke semua record KRS yang dimiliki mahasiswa.
     */
    public function krsRecords()
    {
        return $this->hasMany(KrsRecord::class, 'nim_dinus', 'nim_dinus');
    }

    /**
     * Relasi ke semua nilai yang dimiliki mahasiswa.
     */
    public function daftarNilai()
    {
        return $this->hasMany(DaftarNilai::class, 'nim_dinus', 'nim_dinus');
    }

    /**
     * Relasi ke data IP Semester mahasiswa.
     */
    public function ipSemester()
    {
        return $this->hasMany(IpSemester::class, 'nim_dinus', 'nim_dinus');
    }

    /**
     * Relasi ke data validasi KRS mahasiswa.
     */
    public function validasiKrs()
    {
        return $this->hasMany(ValidasiKrsMhs::class, 'nim_dinus', 'nim_dinus');
    }
}
