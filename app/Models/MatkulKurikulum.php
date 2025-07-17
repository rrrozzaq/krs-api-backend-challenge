<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatkulKurikulum extends Model
{
    use HasFactory;

    protected $table = 'matkul_kurikulum';
    protected $primaryKey = 'kdmk';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
