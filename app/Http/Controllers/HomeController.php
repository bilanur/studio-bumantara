<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Testimoni;

class HomeController extends Controller
{
    public function index()
    {
        $carousels = Carousel::where('is_active', 1)->get();

        $testimonis = Testimoni::with('user')
            ->where('is_show', true)
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('carousels', 'testimonis'));
    }
}
