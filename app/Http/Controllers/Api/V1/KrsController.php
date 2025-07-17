<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKrsRequest;
use App\Http\Resources\AvailableCourseResource;
use App\Http\Resources\KrsResource;
use App\Services\KrsService;

/**
 * @group KRS Mahasiswa
 * Endpoint untuk mengelola Kartu Rencana Studi (KRS) mahasiswa.
 */
class KrsController extends Controller
{
    public function __construct(protected KrsService $krsService) {}

    /**
     * Skenario 1: Melihat KRS Aktif
     * Menampilkan daftar mata kuliah yang sudah diambil mahasiswa pada semester aktif.
     * @authenticated
     * @urlParam nim string required NIM mahasiswa. Example: A11.2022.00001
     * @response status=200 scenario="Sukses" {
     * "data": [
     * {
     * "record_id": 1,
     * "kode_matkul": "A11.003",
     * "nama_matkul": "Basis Data",
     * "sks": 4,
     * "jadwal": {
     * "id": 1,
     * "kelompok": "A11.4201",
     * "hari": "SENIN",
     * "jam_mulai": "07:00:00",
     * "jam_selesai": "08:40:00",
     * "ruang": "H.6.1"
     * }
     * }
     * ]
     * }
     */
    public function currentKrs(string $nim)
    {
        return KrsResource::collection($this->krsService->getCurrentKrs($nim));
    }

    /**
     * Skenario 2: Melihat Mata Kuliah Tersedia
     * Menampilkan semua jadwal mata kuliah yang tersedia dengan filter kelayakan (eligibility).
     * @authenticated
     * @urlParam nim string required NIM mahasiswa. Example: A11.2022.00001
     * @response status=200 scenario="Sukses" {
     * "data": [
     * {
     * "schedule_id": 2,
     * "nama_matkul": "Kalkulus 1",
     * "is_eligible": true,
     * "reason": null
     * },
     * {
     * "schedule_id": 1,
     * "nama_matkul": "Dasar Pemrograman",
     * "is_eligible": false,
     * "reason": "Sudah lulus dengan nilai A."
     * }
     * ]
     * }
     */
    public function availableCourses(string $nim)
    {
        return AvailableCourseResource::collection($this->krsService->getAvailableCourses($nim));
    }

    /**
     * Skenario 3: Registrasi Mata Kuliah (Validasi)
     * Menambahkan satu mata kuliah ke dalam KRS mahasiswa dengan berbagai aturan validasi.
     * @authenticated
     * @urlParam nim string required NIM mahasiswa. Example: A11.2022.00001
     * @bodyParam schedule_id integer required ID dari jadwal yang akan diambil. Example: 2
     * @response status=201 scenario="Sukses" {
     * "data": { "record_id": 16, "kode_matkul": "A11.002", "nama_matkul": "Kalkulus 1", ... }
     * }
     * @response status=422 scenario="Gagal - Kuota Penuh" {
     * "message": "The given data was invalid.",
     * "errors": { "schedule_id": ["Kelas untuk jadwal ini sudah penuh."] }
     * }
     * @response status=422 scenario="Gagal - Jadwal Tabrakan" {
     * "message": "The given data was invalid.",
     * "errors": { "schedule_id": ["Jadwal mata kuliah ini tabrakan dengan yang sudah ada di KRS."] }
     * }
     * @response status=422 scenario="Gagal - Sudah Lulus (Nilai A)" {
     * "message": "The given data was invalid.",
     * "errors": { "schedule_id": ["Mata kuliah ini sudah pernah diambil dengan nilai A."] }
     * }
     */
    public function registerCourse(StoreKrsRequest $request, string $nim)
    {
        $krsRecord = $this->krsService->registerCourse($nim, $request->validated()['schedule_id']);
        return (new KrsResource($krsRecord))->response()->setStatusCode(201);
    }

    /**
     * Skenario 4: Hapus Mata Kuliah (Validasi)
     * Menghapus satu mata kuliah dari KRS dengan validasi status.
     * @authenticated
     * @urlParam nim string required NIM mahasiswa. Example: A11.2022.00001
     * @urlParam schedule_id integer required ID Jadwal yang akan dihapus dari KRS. Example: 1
     * @response status=204 scenario="Sukses"
     * @response status=409 scenario="Gagal - KRS Terkunci" {
     * "message": "KRS sudah divalidasi dan tidak bisa diubah."
     * }
     */
    public function removeCourse(string $nim, int $schedule_id)
    {
        $this->krsService->removeCourse($nim, $schedule_id);
        return response()->json(null, 204);
    }

    /**
     * Bonus: Melihat Status KRS
     * Menampilkan rekap status validasi, total SKS, dan IPS semester lalu.
     * @authenticated
     * @urlParam nim string required NIM mahasiswa. Example: A11.2022.00001
     * @response status=200 scenario="Sukses" {
     * "data": {
     * "nim": "A11.2022.00001",
     * "semester_aktif": "20241",
     * "status_validasi": "Belum Divalidasi",
     * "total_sks_semester_ini": 8,
     * "ips_semester_lalu": 3.75
     * }
     * }
     */
    public function status(string $nim)
    {
        return response()->json(['data' => $this->krsService->getKrsStatus($nim)]);
    }
}
