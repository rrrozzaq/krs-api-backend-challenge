<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKrsRequest;
use App\Http\Resources\AvailableCourseResource;
use App\Http\Resources\KrsResource;
use App\Services\KrsService;

/**
 * @group KRS Mahasiswa
 * Endpoints untuk mengelola Kartu Rencana Studi (KRS) mahasiswa.
 */
class KrsController extends Controller
{
    public function __construct(protected KrsService $krsService) {}

    /**
     * Get Current KRS
     * Menampilkan daftar mata kuliah yang sudah diambil mahasiswa pada semester aktif.
     * @authenticated
     * @urlParam nim string required NIM mahasiswa. Example: A11.2022.00001
     */
    public function currentKrs(string $nim)
    {
        return KrsResource::collection($this->krsService->getCurrentKrs($nim));
    }

    /**
     * Get Available Courses
     * Menampilkan semua jadwal mata kuliah yang tersedia untuk diambil, beserta status kelayakannya.
     * @authenticated
     * @urlParam nim string required NIM mahasiswa. Example: A11.2022.00001
     */
    public function availableCourses(string $nim)
    {
        return AvailableCourseResource::collection($this->krsService->getAvailableCourses($nim));
    }

    /**
     * Register Course to KRS
     * Menambahkan satu mata kuliah ke dalam KRS mahasiswa.
     * @authenticated
     * @urlParam nim string required NIM mahasiswa. Example: A11.2022.00002
     * @bodyParam schedule_id integer required ID dari jadwal yang akan diambil. Example: 2
     */
    public function registerCourse(StoreKrsRequest $request, string $nim)
    {
        $krsRecord = $this->krsService->registerCourse($nim, $request->validated()['schedule_id']);
        return (new KrsResource($krsRecord))->response()->setStatusCode(201);
    }

    /**
     * Remove Course from KRS
     * Menghapus satu mata kuliah dari KRS mahasiswa.
     * @authenticated
     * @urlParam nim string required NIM mahasiswa. Example: A11.2022.00001
     * @urlParam schedule_id integer required ID Jadwal yang akan dihapus dari KRS. Example: 1
     */
    public function removeCourse(string $nim, int $schedule_id)
    {
        $this->krsService->removeCourse($nim, $schedule_id);
        return response()->json(null, 204);
    }

    /**
     * Get KRS Status
     * Menampilkan status validasi, total SKS, dan IPS semester lalu.
     * @authenticated
     * @urlParam nim string required NIM mahasiswa. Example: A11.2022.00001
     */
    public function status(string $nim)
    {
        return response()->json(['data' => $this->krsService->getKrsStatus($nim)]);
    }
}
