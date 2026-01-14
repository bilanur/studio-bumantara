<?php

namespace App\Http\Controllers;

use App\Models\Carousel;

class AboutController extends Controller
{
    public function index()
    {
        $carousels = Carousel::where('is_active', 1)->get();
        return view('about', compact('carousels'));
    }
}
