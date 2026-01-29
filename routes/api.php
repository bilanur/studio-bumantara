<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TimeSlotApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Time Slots API Routes
Route::get('/available-times', [TimeSlotApiController::class, 'getAvailableTimeSlots']);
Route::get('/check-availability', [TimeSlotApiController::class, 'checkAvailability']);