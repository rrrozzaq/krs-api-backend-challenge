<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KrsRecord extends Model
{
    use HasFactory;

    protected $table = 'krs_record';
    public $timestamps = false;

    protected $fillable = [
        'ta',
        'kdmk',
        'id_jadwal',
        'nim_dinus',
        'sts',
        'sks',
        'modul',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaDinus::class, 'nim_dinus', 'nim_dinus');
    }

    public function jadwalTawar()
    {
        return $this->belongsTo(JadwalTawar::class, 'id_jadwal', 'id');
    }

    public function matkulKurikulum()
    {
        return $this->belongsTo(MatkulKurikulum::class, 'kdmk', 'kdmk');
    }
}
