@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Edit Voucher</h2>

    <form action="{{ route('admin.vouchers.update', $voucher->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Kode Voucher</label>
            <input type="text" class="form-control"
                   value="{{ $voucher->code }}" disabled>
        </div>

        <div class="mb-3">
            <label>Tipe Diskon</label>
            <select name="type" class="form-control">
                <option value="fixed" {{ $voucher->type == 'fixed' ? 'selected' : '' }}>
                    Potongan Harga (Rp)
                </option>
                <option value="percent" {{ $voucher->type == 'percent' ? 'selected' : '' }}>
                    Persen (%)
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nilai Diskon</label>
            <input type="number" name="value"
                   value="{{ $voucher->value }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Kuota</label>
            <input type="number" name="quota"
                   value="{{ $voucher->quota }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal Kadaluarsa</label>
            <input type="date" name="expired_at"
                   value="{{ $voucher->expired_at }}"
                   class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.vouchers.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
