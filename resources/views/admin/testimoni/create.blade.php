@extends('admin.layout')

@section('content')
<h4>Edit Testimoni</h4>

<form action="/admin/testimoni/{{ $testimoni->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <select name="user_id" class="form-control mb-2">
        @foreach($users as $user)
        <option value="{{ $user->id }}"
            {{ $testimoni->user_id == $user->id ? 'selected' : '' }}>
            {{ $user->name }}
        </option>
        @endforeach
    </select>

    <input type="number" name="rating" value="{{ $testimoni->rating }}" class="form-control mb-2">
    <textarea name="comment" class="form-control mb-2">{{ $testimoni->comment }}</textarea>

    @if($testimoni->image)
    <img src="{{ asset('storage/'.$testimoni->image) }}" width="120" class="mb-2">
    @endif

    <input type="file" name="image" class="form-control mb-2">

    <div class="form-check mb-3">
        <input type="checkbox" name="is_show" class="form-check-input"
            {{ $testimoni->is_show ? 'checked' : '' }}>
        <label class="form-check-label">Tampilkan</label>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection