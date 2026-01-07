<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TestimoniController;

Route::get('/', function () {
    return view('home');
});

Route::get('/', function () {
    return view('about');
});

Route::get('/', function () {
    return view('packages');
});

Route::get('/', function () {
    return view('booking1');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/admin/dashboard', [DashboardController::class, 'index']);


Route::get('/admin/booking', [BookingController::class, 'index']);


Route::get('/admin/user', [UserController::class, 'index']);
Route::get('/admin/user/create', [UserController::class, 'create']);
Route::post('/admin/user', [UserController::class, 'store']);
Route::get('/admin/user/{id}/edit', [UserController::class, 'edit']);
Route::put('/admin/user/{id}', [UserController::class, 'update']);
Route::delete('/admin/user/{id}', [UserController::class, 'destroy']);


Route::get('/admin/package', [PackageController::class, 'index']);
Route::get('/admin/package/create', [PackageController::class, 'create']);
Route::post('/admin/package', [PackageController::class, 'store']);
Route::get('/admin/package/{id}/edit', [PackageController::class, 'edit']);
Route::put('/admin/package/{id}', [PackageController::class, 'update']);
Route::delete('/admin/package/{id}', [PackageController::class, 'destroy']);


Route::get('/admin/schedule', [ScheduleController::class, 'index']);
Route::get('/admin/schedule/create', [ScheduleController::class, 'create']);
Route::post('/admin/schedule', [ScheduleController::class, 'store']);
Route::get('/admin/schedule/{id}/edit', [ScheduleController::class, 'edit']);
Route::put('/admin/schedule/{id}', [ScheduleController::class, 'update']);
Route::delete('/admin/schedule/{id}', [ScheduleController::class, 'destroy']);


Route::get('/admin/gallery', [GalleryController::class, 'index']);
Route::get('/admin/gallery/create', [GalleryController::class, 'create']);
Route::post('/admin/gallery', [GalleryController::class, 'store']);
Route::get('/admin/gallery/{id}/edit', [GalleryController::class, 'edit']);
Route::put('/admin/gallery/{id}', [GalleryController::class, 'update']);
Route::delete('/admin/gallery/{id}', [GalleryController::class, 'destroy']);


Route::get('/admin/testimoni', [TestimoniController::class, 'index']);
Route::get('/admin/testimoni/{id}/edit', [TestimoniController::class, 'edit']);
Route::post('/admin/testimoni', [TestimoniController::class, 'store']);
Route::put('/admin/testimoni/{id}', [TestimoniController::class, 'update']);
Route::delete('/admin/testimoni/{id}', [TestimoniController::class, 'destroy']);

require __DIR__.'/auth.php';
