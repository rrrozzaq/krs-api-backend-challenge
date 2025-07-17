<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IpSemester extends Model
{
    protected $table = 'ip_semester';
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
