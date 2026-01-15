<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;

class HomeController extends Controller
{

    public function index()
    {
        $carousels = Carousel::where('is_active', 1)->get();

        return view('home', compact('carousels'));
    }
}
