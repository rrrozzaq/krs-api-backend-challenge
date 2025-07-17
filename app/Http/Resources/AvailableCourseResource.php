<?php
namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class AvailableCourseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'schedule_id' => $this->id, 'kode_matkul' => $this->kdmk, 'nama_matkul' => $this->matkulKurikulum->nmmk,
            'sks' => (int) $this->matkulKurikulum->sks, 'kelompok' => $this->klpk, 'kuota' => $this->jmax,
            'sisa_kuota' => $this->jsisa,
            'jadwal' => [
                'hari' => $this->hari1->nama, 'jam_mulai' => $this->sesi1->jam_mulai,
                'jam_selesai' => $this->sesi1->jam_selesai, 'ruang' => $this->ruang1->nama,
            ],
            'is_eligible' => $this->is_eligible,
            'reason' => $this->when(!$this->is_eligible, $this->reason),
        ];
    }
}
