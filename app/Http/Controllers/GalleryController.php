<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');

        $galleries = Gallery::where('is_public', 1)
            ->when($category, function ($query) use ($category) {
                $query->where('category', $category);
            })
            ->latest()
            ->get();

        $categories = [
            'wisuda',
            'keluarga',
            'bestie',
            'group',
            'professional',
            'bisnis',
            'couple',
            'prewedding',
            'maternity',
        ];

        return view('gallery', compact(
            'galleries',
            'categories',
            'category'
        ));
    }
}
