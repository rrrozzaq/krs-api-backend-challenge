<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValidasiKrsMhs extends Model
{
    protected $table = 'validasi_krs_mhs';
    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaDinus::class, 'nim_dinus', 'nim_dinus');
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'ta', 'kode');
    }
}
