<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        // ✅ VALIDASI
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'category' => 'nullable|in:wisuda,keluarga,BESTie,group,professional,couple,prewedding,maternity'
        ]);

        // ✅ UPLOAD IMAGE
        $image = $request->file('image')->store('gallery', 'public');

        // ✅ SIMPAN DATA
        Gallery::create([
            'title'     => $request->title,
            'image'     => $image,
            'category'  => $request->category,
            'is_public' => $request->has('is_public') ? 1 : 0,
        ]);

        return redirect('/admin/gallery')->with('success', 'Foto berhasil ditambahkan');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        // ✅ VALIDASI
        $request->validate([
            'title' => 'required',
            'category' => 'nullable|in:wisuda,keluarga,BESTie,group,professional,couple,prewedding,maternity'
        ]);

        $data = [
            'title'     => $request->title,
            'category'  => $request->category,
            'is_public' => $request->has('is_public') ? 1 : 0,
        ];

        // ✅ JIKA GANTI FOTO
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image);
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($data);

        return redirect('/admin/gallery')->with('success', 'Galeri berhasil diupdate');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return redirect('/admin/gallery')->with('success', 'Galeri berhasil dihapus');
    }
}
