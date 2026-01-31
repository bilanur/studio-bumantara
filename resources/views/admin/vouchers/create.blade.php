@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Tambah Voucher</h2>

    <form action="{{ route('admin.vouchers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Kode Voucher</label>
            <input type="text" name="code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tipe Diskon</label>
            <select name="type" class="form-control" required>
                <option value="fixed">Potongan Harga (Rp)</option>
                <option value="percent">Persen (%)</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nilai Diskon</label>
            <input type="number" name="value" class="form-control" required>
            <small class="text-muted">
                Contoh: 10000 (Rp) atau 10 (%)
            </small>
        </div>

        <div class="mb-3">
            <label>Kuota</label>
            <input type="number" name="quota" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Kadaluarsa</label>
            <input type="date" name="expired_at" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.vouchers.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
