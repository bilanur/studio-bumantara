<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/packages', fn () => view('packages'))->name('packages');
Route::get('/claimphoto', fn () => view('claimphoto'))->name('claimphoto');
Route::get('/gallery', fn () => view('gallery'))->name('gallery');

Route::get('/booking-1', function () {
    return view('booking1');
})->name('booking1');

Route::get('/booking-2', function () {
    return view('booking2');
})->name('booking');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', fn () => view('admin.dashboard'))
        ->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))
        ->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
