<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminTransactionController extends Controller
{
    // Halaman daftar semua transaksi dengan pagination
    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.transactions.index', compact('transactions'));
    }

    // Halaman edit transaksi (upload drive link)
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('admin.transactions.edit', compact('transaction'));
    }

    // Proses update drive link
    public function update(Request $request, $id)
    {
        $request->validate([
            'drive_link' => 'required|url',
            'expiry_days' => 'required|integer|min:1|max:30'
        ], [
            'drive_link.required' => 'Link Google Drive wajib diisi',
            'drive_link.url' => 'Format URL tidak valid',
            'expiry_days.required' => 'Masa berlaku wajib diisi',
            'expiry_days.min' => 'Minimal 1 hari',
            'expiry_days.max' => 'Maksimal 30 hari'
        ]);

        $transaction = Transaction::findOrFail($id);
        
        // ✅ FIX: Cast expiry_days ke integer
        $transaction->update([
            'drive_link' => $request->drive_link,
            'expiry_date' => now()->addDays((int)$request->expiry_days),
            'status' => 'completed'
        ]);

        return redirect()
            ->route('admin.transactions.index')
            ->with('success', 'Link Google Drive berhasil ' . ($transaction->wasChanged('drive_link') ? 'diupdate' : 'ditambahkan') . '!');
    }
}