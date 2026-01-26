<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\PackagePageController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookingController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/packages', [PackagePageController::class, 'index'])->name('packages');
Route::get('/gallery', fn () => view('gallery'))->name('gallery');
Route::get('/claimphoto', fn () => view('claimphoto'))->name('claimphoto');
Route::get('/claim-2', fn () => view('claim2'))->name('claim2');
Route::get('/testimoni', fn () => view('testimoni'))->name('testimoni');

// Booking Routes (Public)
Route::get('/packages', [BookingController::class, 'packages'])->name('packages');
Route::get('/booking1', [BookingController::class, 'booking1'])->name('booking1');
Route::get('/booking2', [BookingController::class, 'booking2'])->name('booking2');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::post('/booking/available-slots', [BookingController::class, 'getAvailableSlots'])->name('booking.slots');

// Pesanan (harus login)
Route::middleware('auth')->group(function() {
    Route::get('/pesanan', [BookingController::class, 'myBookings'])->name('booking3');
});

// Auth User
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ========================================
// ADMIN ROUTES (LOGIN + ADMIN)
// ========================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // BOOKING (Admin)
    Route::get('/booking', [AdminBookingController::class, 'index'])->name('booking.index');
    Route::put('/booking/{id}/update-status', [AdminBookingController::class, 'updateStatus'])->name('booking.update-status');
    Route::put('/booking/{id}/update-payment', [AdminBookingController::class, 'updatePayment'])->name('booking.update-payment');

    // USER
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // PACKAGE
    Route::get('/package', [PackageController::class, 'index'])->name('package.index');
    Route::get('/package/create', [PackageController::class, 'create'])->name('package.create');
    Route::post('/package', [PackageController::class, 'store'])->name('package.store');
    Route::get('/package/{id}/edit', [PackageController::class, 'edit'])->name('package.edit');
    Route::put('/package/{id}', [PackageController::class, 'update'])->name('package.update');
    Route::delete('/package/{id}', [PackageController::class, 'destroy'])->name('package.destroy');

    // SCHEDULE
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::get('/schedule/{id}/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');
    Route::put('/schedule/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');

    // GALLERY
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // TESTIMONI
    Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
    Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
    Route::get('/testimoni/{id}/edit', [TestimoniController::class, 'edit'])->name('testimoni.edit');
    Route::put('/testimoni/{id}', [TestimoniController::class, 'update'])->name('testimoni.update');
    Route::delete('/testimoni/{id}', [TestimoniController::class, 'destroy'])->name('testimoni.destroy');

    // CAROUSEL
    Route::get('/carousel', [CarouselController::class, 'index'])->name('carousel.index');
    Route::post('/carousel', [CarouselController::class, 'store'])->name('carousel.store');
    Route::delete('/carousel/{id}', [CarouselController::class, 'destroy'])->name('carousel.destroy');
});

require __DIR__.'/auth.php';