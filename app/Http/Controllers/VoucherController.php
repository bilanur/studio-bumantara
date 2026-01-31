<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public function apply(Request $request)
    {
        $voucher = Voucher::where('code', $request->code)
            ->where('status', 'active')
            ->first();

        if (!$voucher) {
            return response()->json([
                'success' => false,
                'message' => 'Voucher tidak valid'
            ]);
        }

        if ($voucher->quota <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Kuota voucher habis'
            ]);
        }

        $subtotal = session('subtotal'); // HARUS diset saat load page
        $discount = $voucher->discount_amount;
        $total = max(0, $subtotal - $discount);

        session([
            'voucher_code' => $voucher->code,
            'voucher_discount' => $discount
        ]);

        return response()->json([
            'success' => true,
            'discount' => $discount,
            'total' => $total
        ]);
    }
}
