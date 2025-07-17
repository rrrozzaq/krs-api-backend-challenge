<?php

namespace App\Services;

use App\Exceptions\KrsRegistrationException;
use App\Models\{DaftarNilai, IpSemester, JadwalTawar, KrsRecord, MahasiswaDinus, ValidasiKrsMhs};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KrsService
{
    public function getCurrentKrs(string $nim)
    {
        return KrsRecord::with(['matkulKurikulum', 'jadwalTawar.hari1', 'jadwalTawar.sesi1', 'jadwalTawar.ruang1'])
            ->where('nim_dinus', $nim)
            ->where('ta', config('academic.active_semester'))
            ->get();
    }

    public function getAvailableCourses(string $nim)
    {
        $activeSemester = config('academic.active_semester');
        $currentKrs = $this->getCurrentKrs($nim);
        $takenTimeSlots = $currentKrs->map(fn($krs) => $krs->jadwalTawar->id_hari1 . '-' . $krs->jadwalTawar->id_sesi1);
        $passedWithA = DaftarNilai::where('nim_dinus', $nim)->where('nl', 'A')->pluck('kdmk');

        return JadwalTawar::with(['matkulKurikulum', 'hari1', 'sesi1', 'ruang1'])
            ->where('ta', $activeSemester)->where('open_class', 1)->get()
            ->map(function ($course) use ($takenTimeSlots, $passedWithA) {
                $course->is_eligible = true;
                $course->reason = null;
                $timeSlot = $course->id_hari1 . '-' . $course->id_sesi1;
                if ($course->jsisa <= 0) {
                    $course->is_eligible = false;
                    $course->reason = 'Kelas penuh.';
                } elseif ($takenTimeSlots->contains($timeSlot)) {
                    $course->is_eligible = false;
                    $course->reason = 'Jadwal tabrakan.';
                } elseif ($passedWithA->contains($course->kdmk)) {
                    $course->is_eligible = false;
                    $course->reason = 'Sudah lulus dengan nilai A.';
                }
                return $course;
            });
    }

    public function registerCourse(string $nim, int $scheduleId)
    {
        $schedule = JadwalTawar::with('matkulKurikulum')->findOrFail($scheduleId);

        if (!$schedule->matkulKurikulum) {
            throw new KrsRegistrationException("Data master mata kuliah tidak ditemukan untuk jadwal ini.");
        }

        $krsRecord = KrsRecord::create([
            'ta' => config('academic.active_semester'),
            'kdmk' => $schedule->kdmk,
            'id_jadwal' => $schedule->id,
            'nim_dinus' => $nim,
            'sts' => 'B',
            'sks' => $schedule->matkulKurikulum->sks,
        ]);

        $schedule->decrement('jsisa');

        Log::info("Proses TANPA TRANSAKSI selesai untuk NIM {$nim}.");

        return $krsRecord->load(['matkulKurikulum', 'jadwalTawar.hari1', 'jadwalTawar.sesi1', 'jadwalTawar.ruang1']);
    }

    public function removeCourse(string $nim, int $scheduleId)
    {
        if (ValidasiKrsMhs::where('nim_dinus', $nim)->where('ta', config('academic.active_semester'))->exists()) {
            throw new KrsRegistrationException('KRS sudah divalidasi dan tidak bisa diubah.');
        }
        $krsRecord = KrsRecord::where('nim_dinus', $nim)->where('id_jadwal', $scheduleId)
            ->where('ta', config('academic.active_semester'))->firstOrFail();
        DB::transaction(function () use ($krsRecord, $nim) {
            JadwalTawar::find($krsRecord->id_jadwal)->increment('jsisa');
            $krsRecord->delete();
            Log::info("KRS Removal: NIM {$nim} removed course {$krsRecord->kdmk} (Schedule ID: {$krsRecord->id_jadwal}).");
        });
    }

    public function getKrsStatus(string $nim)
    {
        $activeSemester = config('academic.active_semester');
        $year = substr($activeSemester, 0, 4);
        $semester = substr($activeSemester, 4, 1);
        $previousSemester = ($semester == '1') ? ($year - 1) . '2' : $year . '1';
        $isValidated = ValidasiKrsMhs::where('nim_dinus', $nim)->where('ta', $activeSemester)->exists();
        $totalSks = KrsRecord::where('nim_dinus', $nim)->where('ta', $activeSemester)->sum('sks');
        $previousIps = IpSemester::where('nim_dinus', $nim)->where('ta', $previousSemester)->value('ips');
        return [
            'nim' => $nim,
            'semester_aktif' => $activeSemester,
            'status_validasi' => $isValidated ? 'Tervalidasi' : 'Belum Divalidasi',
            'total_sks_semester_ini' => (int) $totalSks,
            'ips_semester_lalu' => $previousIps ? (float) $previousIps : null,
        ];
    }
}
