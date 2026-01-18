<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // 🔖 daftar kategori terpusat
    private array $categories = [
        'wisuda',
        'keluarga',
        'bestie',
        'group',
        'professional',
        'couple',
        'prewedding',
        'maternity',
    ];

    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        $categories = $this->categories;
        return view('admin.gallery.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'image'     => 'required|image',
            'category'  => 'required|in:' . implode(',', $this->categories),
        ]);

        $image = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title'     => $request->title,
            'image'     => $image,
            'category'  => $request->category,
            'is_public' => $request->has('is_public'),
        ]);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Foto berhasil ditambahkan');
    }

    public function edit($id)
    {
        $gallery    = Gallery::findOrFail($id);
        $categories = $this->categories;

        return view('admin.gallery.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title'     => 'required',
            'category'  => 'required|in:' . implode(',', $this->categories),
        ]);

        $data = [
            'title'     => $request->title,
            'category'  => $request->category,
            'is_public' => $request->has('is_public'),
        ];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image);
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($data);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Galeri berhasil dihapus');
    }
}
