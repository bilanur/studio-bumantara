<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('testimoni', 'public');
        }

        Testimoni::create([
            'user_id' => Auth::id(),
            'rating'  => $request->rating,
            'comment' => $request->comment,
            'image'   => $imagePath,
            'is_show' => true,
        ]);

        return redirect()
            ->route('testimoni')
            ->with('success', 'Testimoni berhasil dikirim 🙏');
    }
}
