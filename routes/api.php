<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthRecordController;

/* Bypass seluruh Middleware (Termasuk Throttle) yang menulis File */
Route::get('/health-records', [HealthRecordController::class, 'index']);
Route::post('/health-records', [HealthRecordController::class, 'store']);
Route::get('/health-records/{id}', [HealthRecordController::class, 'show']);
