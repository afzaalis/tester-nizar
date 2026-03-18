<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\HealthRecordController;

// Disable auth:sanctum temporary for JMeter testing
Route::middleware(['throttle:10000,1'])->group(function () {
    Route::get('/health-records', [HealthRecordController::class, 'index']);
    Route::post('/health-records', [HealthRecordController::class, 'store']);
    Route::get('/health-records/{id}', [HealthRecordController::class, 'show']);
});
