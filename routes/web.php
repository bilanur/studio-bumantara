<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// PUBLIC CONTROLLER
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PackagePageController;
use App\Http\Controllers\GalleryController;

// ADMIN CONTROLLER
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\CarouselController;

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES (USER)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/packages', [PackagePageController::class, 'index'])->name('packages');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/claimphoto', fn() => view('claimphoto'))->name('claimphoto');

/*
|--------------------------------------------------------------------------
| BOOKING (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/booking-1', fn() => view('booking1'))->name('booking1');
Route::get('/booking-2', fn() => view('booking2'))->name('booking2');
Route::get('/booking-3', fn() => view('booking3'))->name('booking3');

/*
|--------------------------------------------------------------------------
| AUTH USER
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // DASHBOARD
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // BOOKING
        Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');

        // USER
        Route::resource('user', UserController::class)->except(['show']);

        // PACKAGE
        Route::resource('package', PackageController::class)->except(['show']);

        // SCHEDULE
        Route::resource('schedule', ScheduleController::class)->except(['show']);

        // GALLERY ADMIN
        Route::resource('gallery', AdminGalleryController::class)->except(['show']);

        // TESTIMONI
        Route::resource('testimoni', TestimoniController::class)->except(['show']);

        // CAROUSEL
        Route::get('/carousel', [CarouselController::class, 'index'])->name('carousel.index');
        Route::post('/carousel', [CarouselController::class, 'store'])->name('carousel.store');
        Route::delete('/carousel/{id}', [CarouselController::class, 'destroy'])->name('carousel.destroy');
    });

require __DIR__ . '/auth.php';
