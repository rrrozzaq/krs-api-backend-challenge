<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKrsRequest;
use App\Http\Resources\AvailableCourseResource;
use App\Http\Resources\KrsResource;
use App\Services\KrsService;

class KrsController extends Controller
{
    public function __construct(protected KrsService $krsService) {}

    public function currentKrs(string $nim)
    {
        return KrsResource::collection($this->krsService->getCurrentKrs($nim));
    }

    public function availableCourses(string $nim)
    {
        return AvailableCourseResource::collection($this->krsService->getAvailableCourses($nim));
    }

    public function registerCourse(StoreKrsRequest $request, string $nim)
    {
        $krsRecord = $this->krsService->registerCourse($nim, $request->validated()['schedule_id']);
        return (new KrsResource($krsRecord))->response()->setStatusCode(201);
    }

    public function removeCourse(string $nim, int $schedule_id)
    {
        $this->krsService->removeCourse($nim, $schedule_id);
        return response()->json(null, 204);
    }

    public function status(string $nim)
    {
        return response()->json(['data' => $this->krsService->getKrsStatus($nim)]);
    }
}
