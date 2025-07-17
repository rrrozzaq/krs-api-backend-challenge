<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTawar extends Model
{
    use HasFactory;

    protected $table = 'jadwal_tawar';
    public $timestamps = false;

    protected $fillable = [
        'ta',
        'kdmk',
        'klpk',
        'jmax',
        'jsisa',
        'id_hari1', 'id_sesi1', 'id_ruang1',
        'id_hari2', 'id_sesi2', 'id_ruang2',
        'id_hari3', 'id_sesi3', 'id_ruang3',
    ];

    public function matkulKurikulum()
    {
        return $this->belongsTo(MatkulKurikulum::class, 'kdmk', 'kdmk');
    }

    public function hari1()
    {
        return $this->belongsTo(Hari::class, 'id_hari1', 'id');
    }

    public function sesi1()
    {
        return $this->belongsTo(SesiKuliah::class, 'id_sesi1', 'id');
    }

    public function ruang1()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang1', 'id');
    }
}
