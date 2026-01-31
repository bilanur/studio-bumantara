<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class AdminVoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::latest()->get();
        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        return view('admin.vouchers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:vouchers,code',
            'type' => 'required|in:fixed,percent',
            'value' => 'required|integer|min:1',
            'quota' => 'required|integer|min:1',
            'expired_at' => 'required|date'
        ]);

        Voucher::create([
            'code' => strtoupper($request->code),
            'type' => $request->type,
            'value' => $request->value,
            'quota' => $request->quota,
            'expired_at' => $request->expired_at,
            'is_active' => true
        ]);

        return redirect()
            ->route('admin.vouchers.index')
            ->with('success', 'Voucher berhasil ditambahkan');
    }

    public function edit(Voucher $voucher)
    {
        return view('admin.vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $request->validate([
            'type' => 'required|in:fixed,percent',
            'value' => 'required|integer|min:1',
            'quota' => 'required|integer|min:0',
            'expired_at' => 'required|date',
            'is_active' => 'required|boolean'
        ]);

        $voucher->update($request->all());

        return redirect()
            ->route('admin.vouchers.index')
            ->with('success', 'Voucher berhasil diupdate');
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        return back()->with('success', 'Voucher berhasil dihapus');
    }
}
