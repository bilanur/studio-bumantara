<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PackagePageController;
use App\Http\Controllers\GalleryController;

/* ADMIN */
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\CarouselController;

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/packages', [PackagePageController::class, 'index'])->name('packages');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::view('/claimphoto', 'claimphoto')->name('claimphoto');
Route::view('/claim-2', 'claim2')->name('claim2');

Route::view('/booking-1', 'booking1')->name('booking1');
Route::view('/booking-2', 'booking2')->name('booking2');
Route::view('/booking-3', 'booking3')->name('booking3');
Route::view('/booking-4', 'booking4')->name('booking4');

/*
|--------------------------------------------------------------------------
| AUTH USER
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| ADMIN (AUTH + ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/booking', [BookingController::class, 'index']);

    // USER
    Route::resource('user', UserController::class);

    // PACKAGE
    Route::resource('package', PackageController::class)
        ->names('admin.package');

    // SCHEDULE
    Route::resource('schedule', ScheduleController::class);

    // GALLERY ADMIN
    Route::resource('gallery', AdminGalleryController::class)
        ->names('admin.gallery');

    // TESTIMONI
    Route::resource('testimoni', TestimoniController::class);

    // CAROUSEL
    Route::get('/carousel', [CarouselController::class, 'index']);
    Route::post('/carousel', [CarouselController::class, 'store']);
    Route::delete('/carousel/{id}', [CarouselController::class, 'destroy']);
});

require __DIR__ . '/auth.php';
