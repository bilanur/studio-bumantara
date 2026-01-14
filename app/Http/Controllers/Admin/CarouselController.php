<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::latest()->get();
        return view('admin.carousel.index', compact('carousels'));
    }

    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'image' => $request->file('image')->store('carousel', 'public'),
        ];

        Carousel::create($data);

        return redirect('/admin/carousel')->with('success', 'Foto carousel berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);
        Storage::disk('public')->delete($carousel->image);
        $carousel->delete();

        return redirect('/admin/carousel')->with('success', 'Foto carousel dihapus');
    }
}
