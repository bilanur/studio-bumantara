@extends('admin.layout')

@section('content')
<h4>Tambah Jadwal</h4>

<form method="POST" action="/admin/schedule">
    @csrf

    <label>Tanggal</label>
    <input type="date" name="date" class="form-control mb-2">

    <label>Jam</label>
    <input type="time" name="time" class="form-control mb-2">

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="is_available" checked>
        <label class="form-check-label">Tersedia</label>
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection