<?php

namespace App\Providers;

use App\Models\Booking;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('admin.*', function ($view) {
            $newBookingCount = Booking::where('status', 'Menunggu Pembayaran')->count();

            $view->with('newBookingCount', $newBookingCount);
        });
    }
}
