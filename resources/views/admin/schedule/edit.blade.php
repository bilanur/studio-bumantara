@extends('admin.layout')

@section('content')
<h4>Edit Jadwal</h4>

<form method="POST" action="/admin/schedule/{{ $schedule->id }}">
    @csrf
    @method('PUT')

    <label>Tanggal</label>
    <input type="date" name="date" value="{{ $schedule->date }}" class="form-control mb-2">

    <label>Jam</label>
    <input type="time" name="time" value="{{ $schedule->time }}" class="form-control mb-2">

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="is_available"
            {{ $schedule->is_available ? 'checked' : '' }}>
        <label class="form-check-label">Tersedia</label>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection