@extends('admin.layout')

@section('content')
<h4>Edit Foto Galeri</h4>

<form method="POST" action="/admin/gallery/{{ $gallery->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input class="form-control mb-2" name="title" value="{{ $gallery->title }}">
    <input class="form-control mb-2" name="category" value="{{ $gallery->category }}">

    <img src="{{ asset('storage/'.$gallery->image) }}" width="200" class="mb-2"><br>

    <input type="file" class="form-control mb-2" name="image">

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="is_public"
            {{ $gallery->is_public ? 'checked' : '' }}>
        <label class="form-check-label">Tampilkan ke publik</label>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection