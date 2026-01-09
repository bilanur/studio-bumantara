<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TestimoniController;

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('home'))->name('home');
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/packages', fn () => view('packages'))->name('packages');
Route::get('/gallery', fn () => view('gallery'))->name('gallery');
Route::get('/claimphoto', fn () => view('claimphoto'))->name('claimphoto');

/*
|--------------------------------------------------------------------------
| BOOKING
|--------------------------------------------------------------------------
*/
Route::get('/booking-1', fn () => view('booking1'))->name('booking1');
Route::get('/booking-2', fn () => view('booking2'))->name('booking2');
Route::get('/booking-3', fn () => view('booking3'))->name('booking3');

/*
|--------------------------------------------------------------------------
| AUTH USER
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN (HARUS LOGIN + ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/booking', [BookingController::class, 'index']);

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);

    Route::get('/package', [PackageController::class, 'index']);
    Route::get('/package/create', [PackageController::class, 'create']);
    Route::post('/package', [PackageController::class, 'store']);
    Route::get('/package/{id}/edit', [PackageController::class, 'edit']);
    Route::put('/package/{id}', [PackageController::class, 'update']);
    Route::delete('/package/{id}', [PackageController::class, 'destroy']);

    Route::get('/schedule', [ScheduleController::class, 'index']);
    Route::get('/schedule/create', [ScheduleController::class, 'create']);
    Route::post('/schedule', [ScheduleController::class, 'store']);
    Route::get('/schedule/{id}/edit', [ScheduleController::class, 'edit']);
    Route::put('/schedule/{id}', [ScheduleController::class, 'update']);
    Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy']);

    Route::get('/gallery', [GalleryController::class, 'index']);
    Route::get('/gallery/create', [GalleryController::class, 'create']);
    Route::post('/gallery', [GalleryController::class, 'store']);
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit']);
    Route::put('/gallery/{id}', [GalleryController::class, 'update']);
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy']);

    Route::get('/testimoni', [TestimoniController::class, 'index']);
    Route::post('/testimoni', [TestimoniController::class, 'store']);
    Route::get('/testimoni/{id}/edit', [TestimoniController::class, 'edit']);
    Route::put('/testimoni/{id}', [TestimoniController::class, 'update']);
    Route::delete('/testimoni/{id}', [TestimoniController::class, 'destroy']);
});

require __DIR__.'/auth.php';
