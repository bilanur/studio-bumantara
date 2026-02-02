<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    // Menampilkan halaman pencarian
    public function index()
    {
        return view('claimphoto');
    }

    // Proses pencarian transaksi
    public function search(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string|min:10'
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'phone.required' => 'No telepon wajib diisi',
            'phone.min' => 'No telepon minimal 10 digit'
        ]);

        $transaction = Transaction::where('email', $request->email)
            ->where('phone', $request->phone)
            ->first();

        if (!$transaction) {
            return back()
                ->withInput()
                ->with('error', 'Transaksi tidak ditemukan. Pastikan email dan nomor telepon sudah benar.');
        }

        return redirect()->route('claim.detail', $transaction->id);
    }

    // Menampilkan detail transaksi
    public function detail($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('claim2', compact('transaction'));
    }
    
}