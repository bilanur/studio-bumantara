@extends('admin.layout')

@section('content')
<h4>Tambah Foto Galeri</h4>

<form method="POST" action="/admin/gallery" enctype="multipart/form-data">
    @csrf

    <input class="form-control mb-2" name="title" placeholder="Judul Foto">
    <input class="form-control mb-2" name="category" placeholder="Kategori (opsional)">
    <input type="file" class="form-control mb-2" name="image">

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="is_public" checked>
        <label class="form-check-label">Tampilkan ke publik</label>
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection