<?php
namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class KrsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'record_id' => $this->id, 'kode_matkul' => $this->kdmk, 'nama_matkul' => $this->matkulKurikulum->nmmk,
            'sks' => (int) $this->sks,
            'jadwal' => [
                'id' => $this->jadwalTawar->id, 'kelompok' => $this->jadwalTawar->klpk,
                'hari' => $this->jadwalTawar->hari1->nama, 'jam_mulai' => $this->jadwalTawar->sesi1->jam_mulai,
                'jam_selesai' => $this->jadwalTawar->sesi1->jam_selesai, 'ruang' => $this->jadwalTawar->ruang1->nama,
            ],
        ];
    }
}
