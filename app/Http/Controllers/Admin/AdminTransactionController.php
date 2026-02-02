<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of transactions
     */
    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for editing the transaction drive link
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('admin.transactions.edit', compact('transaction'));
    }

    /**
     * Update the transaction drive link with expiry date
     */
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

        try {
            $transaction = Transaction::findOrFail($id);
            
            // Cast expiry_days ke integer dan update
            $transaction->update([
                'drive_link' => $request->drive_link,
                'expiry_date' => now()->addDays((int)$request->expiry_days),
                'status' => 'completed'
            ]);

            return redirect()
                ->route('admin.transactions.index')
                ->with('success', 'Link Google Drive berhasil ' . ($transaction->wasChanged('drive_link') ? 'diupdate' : 'ditambahkan') . '!');
                
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.transactions.index')
                ->with('error', 'Gagal mengupdate link: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified transaction from storage
     */
    public function destroy($id)
    {
        try {
            $transaction = Transaction::findOrFail($id);
            
            // Store transaction info for success message
            $transactionNumber = $transaction->transaction_number;
            $customerName = $transaction->customer_name;
            
            // Delete the transaction
            $transaction->delete();
            
            return redirect()
                ->route('admin.transactions.index')
                ->with('success', "Transaksi {$transactionNumber} ({$customerName}) berhasil dihapus!");
                
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()
                ->route('admin.transactions.index')
                ->with('error', 'Transaksi tidak ditemukan!');
                
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.transactions.index')
                ->with('error', 'Gagal menghapus transaksi: ' . $e->getMessage());
        }
    }
}