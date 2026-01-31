<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PackagePageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TransactionController;

/* ADMIN */
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\TestimoniController as AdminTestimoniController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\AdminTransactionController;
use App\Http\Controllers\Admin\AdminTimeSlotController;
use App\Http\Controllers\Admin\AdminPromoCodeController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/packages', [PackagePageController::class, 'index'])->name('packages');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::view('/claimphoto', 'claimphoto')->name('claimphoto');
Route::view('/claim-2', 'claim2')->name('claim2');
Route::view('/testimoni', 'testimoni')->name('testimoni');

/*
|--------------------------------------------------------------------------
| BOOKING FLOW
|--------------------------------------------------------------------------
*/

Route::get('/booking1', [BookingController::class, 'booking1'])->name('booking1');
Route::get('/booking2', [BookingController::class, 'booking2'])->name('booking2');

// ⬇️ TAMBAHKAN ROUTE API INI ⬇️
Route::get('/api/available-times', [BookingController::class, 'getAvailableTimes']);
Route::get('/api/booked-slots', [BookingController::class, 'getBookedSlots']);
Route::get('/api/timeslots', [AdminTimeSlotController::class, 'getActiveSlots']);

Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::post('/booking/available-slots', [BookingController::class, 'getAvailableSlots'])->name('booking.slots');

Route::middleware('auth')->group(function () {
    Route::get('/pesanan', [BookingController::class, 'myBookings'])->name('booking3');
});

// Route tambahan dari file kedua
Route::get('/booking', [BookingController::class, 'index'])->name('booking');

Route::get('/check-promo', [BookingController::class, 'checkPromo']);

Route::get('/booking-riwayat', [BookingController::class, 'riwayat'])
    ->name('booking.riwayat');

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
| CLAIM PHOTO (TRANSACTIONS)
|--------------------------------------------------------------------------
*/

// Route Customer
Route::get('/claim-photo', [TransactionController::class, 'index'])->name('claim.index');
Route::post('/claim/search', [TransactionController::class, 'search'])->name('claim.search');
Route::get('/claim/detail/{id}', [TransactionController::class, 'detail'])->name('claim.detail');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // BOOKING ADMIN
    Route::get('/booking', [AdminBookingController::class, 'index'])->name('booking.index');
    Route::put('/booking/{id}/update-status', [AdminBookingController::class, 'updateStatus'])->name('booking.update-status');
    Route::put('/booking/{id}/update-payment', [AdminBookingController::class, 'updatePayment'])->name('booking.update-payment');

     // Route baru untuk delete
    Route::delete('/booking/{id}', [AdminBookingController::class, 'destroy'])->name('booking.destroy');

    // TIME SLOTS
    Route::get('/timeslots', [AdminTimeSlotController::class, 'index']);
    Route::post('/timeslots', [AdminTimeSlotController::class, 'store']);
    Route::put('/timeslots/{id}', [AdminTimeSlotController::class, 'update']);
    Route::post('/timeslots/{id}/toggle', [AdminTimeSlotController::class, 'toggle']);
    Route::delete('/timeslots/{id}', [AdminTimeSlotController::class, 'destroy']);
    Route::post('/timeslots/bulk', [AdminTimeSlotController::class, 'bulkCreate']);

    // TRANSACTIONS ADMIN
    Route::get('/transactions', [AdminTransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/{id}/edit', [AdminTransactionController::class, 'edit'])->name('transactions.edit');
    Route::put('/transactions/{id}', [AdminTransactionController::class, 'update'])->name('transactions.update');

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

    // GALLERY
    Route::get('/gallery', [AdminGalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [AdminGalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [AdminGalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{id}/edit', [AdminGalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{id}', [AdminGalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [AdminGalleryController::class, 'destroy'])->name('gallery.destroy');

    // TESTIMONI
    Route::get('/testimoni', [AdminTestimoniController::class, 'index'])->name('testimoni.index');
    Route::post('/testimoni', [AdminTestimoniController::class, 'store'])->name('testimoni.store');
    Route::get('/testimoni/{id}/edit', [AdminTestimoniController::class, 'edit'])->name('testimoni.edit');
    Route::put('/testimoni/{id}', [AdminTestimoniController::class, 'update'])->name('testimoni.update');
    Route::delete('/testimoni/{id}', [AdminTestimoniController::class, 'destroy'])->name('testimoni.destroy');

    // CAROUSEL
    Route::get('/carousel', [CarouselController::class, 'index'])->name('carousel.index');
    Route::post('/carousel', [CarouselController::class, 'store'])->name('carousel.store');
    Route::delete('/carousel/{id}', [CarouselController::class, 'destroy'])->name('carousel.destroy');

    // REPORT
    Route::get('/laporan', [ReportController::class, 'index'])->name('report.index');

    // CODE PROMO
    Route::get('/kodepromo', [AdminPromoCodeController::class, 'index'])->name('codepromo.index');
    Route::post('/kodepromo', [AdminPromoCodeController::class, 'store']);
    Route::delete('/kodepromo/{id}', [AdminPromoCodeController::class, 'destroy']);
    Route::post('/kodepromo/{id}/toggle', [AdminPromoCodeController::class, 'toggle']);
});

/*
|--------------------------------------------------------------------------
| TESTIMONI PUBLIC POST
|--------------------------------------------------------------------------
*/

Route::post('/testimoni', [TestimoniController::class, 'store'])
    ->middleware('auth')
    ->name('testimoni.store');

require __DIR__.'/auth.php';