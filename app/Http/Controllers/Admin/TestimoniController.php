<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::with('user')->latest()->get();
        $users = User::all();

        return view('admin.testimoni.index', compact('testimonis', 'users'));
    }


    public function store(Request $request)
    {
        $data = [
            'user_id' => Auth::id(), // ⬅️ INI KUNCI UTAMA
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_show' => $request->has('is_show') ? 1 : 0,
        ];

        if ($request->image) {
            $data['image'] = $request->file('image')->store('testimoni', 'public');
        }

        Testimoni::create($data);

        return redirect('/admin/testimoni')->with('success', 'Testimoni berhasil ditambahkan');
    }


    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $users = User::all();

        return view('admin.testimoni.edit', compact('testimoni', 'users'));
    }

    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);

        $data = [
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_show' => $request->has('is_show') ? 1 : 0,
        ];

        if ($request->image) {
            if ($testimoni->image) {
                Storage::disk('public')->delete($testimoni->image);
            }
            $data['image'] = $request->file('image')->store('testimoni', 'public');
        }

        $testimoni->update($data);

        return redirect('/admin/testimoni')->with('success', 'Testimoni berhasil diupdate');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        if ($testimoni->image) {
            Storage::disk('public')->delete($testimoni->image);
        }

        $testimoni->delete();

        return redirect('/admin/testimoni')->with('success', 'Testimoni berhasil dihapus');
    }
}
