<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class AdminPromoCodeController extends Controller
{
    public function index()
    {
        $codes = PromoCode::latest()->get();
        return view('admin.kodepromo.index', compact('codes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:promo_codes',
            'discount' => 'required|numeric|min:0'
        ]);

        PromoCode::create([
            'code' => strtoupper($request->code),
            'discount' => $request->discount,
        ]);

        return back()->with('success', 'Kode promo berhasil dibuat');
    }

    public function destroy($id)
    {
        PromoCode::findOrFail($id)->delete();
        return back()->with('success', 'Kode promo dihapus');
    }

    public function toggle($id)
    {
        $promo = PromoCode::findOrFail($id);
        $promo->is_active = !$promo->is_active;
        $promo->save();

        return back();
    }
}
