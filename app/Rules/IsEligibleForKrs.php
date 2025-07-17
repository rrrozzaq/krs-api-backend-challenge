<?php
namespace App\Rules;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\{JadwalTawar, KrsRecord, DaftarNilai, ValidasiKrsMhs};

class IsEligibleForKrs implements ValidationRule
{
    protected string $nim;
    public function __construct(string $nim) { $this->nim = $nim; }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $activeSemester = config('academic.active_semester');
        $schedule = JadwalTawar::find($value);
        if (ValidasiKrsMhs::where('nim_dinus', $this->nim)->where('ta', $activeSemester)->exists()) {
            $fail('KRS sudah divalidasi dan tidak dapat diubah.');
        }
        if ($schedule->jsisa <= 0) {
            $fail('Kelas untuk jadwal ini sudah penuh.');
        }
        $isConflict = KrsRecord::where('nim_dinus', $this->nim)->where('ta', $activeSemester)
            ->whereHas('jadwalTawar', fn($q) => $q->where('id_hari1', $schedule->id_hari1)->where('id_sesi1', $schedule->id_sesi1))
            ->exists();
        if ($isConflict) {
            $fail('Jadwal mata kuliah ini tabrakan dengan yang sudah ada di KRS.');
        }
        $hasPassed = DaftarNilai::where('nim_dinus', $this->nim)
            ->where('kdmk', $schedule->kdmk)->where('nl', 'A')->exists();
        if ($hasPassed) {
            $fail('Mata kuliah ini sudah pernah diambil dengan nilai A.');
        }
    }
}
