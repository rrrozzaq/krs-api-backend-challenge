<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\KrsController;

Route::post('/v1/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'auth.nim'])->prefix('v1')->group(function () {
    Route::get('/students/{nim}/krs/current', [KrsController::class, 'currentKrs']);
    Route::get('/students/{nim}/courses/available', [KrsController::class, 'availableCourses']);
    Route::post('/students/{nim}/krs/courses', [KrsController::class, 'registerCourse']);
    Route::delete('/students/{nim}/krs/courses/{schedule_id}', [KrsController::class, 'removeCourse']);
    Route::get('/students/{nim}/krs/status', [KrsController::class, 'status']);
});

Route::fallback(fn() => response()->json(['message' => 'Not Found.'], 404));
