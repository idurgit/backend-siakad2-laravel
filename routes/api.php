<?php

use App\Http\Controllers\Api\AbsensiMatkulController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KhsController;
use App\Http\Controllers\Api\ScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum');

Route::apiResource('schedules', ScheduleController::class)
    ->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function() {
    Route::apiResource('khs', KhsController::class);
});

Route::middleware(['auth:sanctum'])->group(function() {
    Route::apiResource('absensi', AbsensiMatkulController::class);
});