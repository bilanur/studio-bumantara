@extends('admin.layout')

@section('content')
<h4>Tambah Foto Galeri</h4>

<form method="POST" action="/admin/gallery" enctype="multipart/form-data">
    @csrf

    <input class="form-control mb-2" name="title" placeholder="Judul Foto">
    <select class="form-control mb-2" name="category">
        <option value="">-- Pilih Kategori --</option>
        <option value="wisuda">Wisuda</option>
        <option value="keluarga">Keluarga</option>
        <option value="BESTie">BESTie</option>
        <option value="group">Group</option>
        <option value="professional">Professional</option>
        <option value="couple">Couple</option>
        <option value="prewedding">Prewedding</option>
        <option value="maternity">Maternity</option>
    </select>

    <input type="file" class="form-control mb-2" name="image">

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="is_public" checked>
        <label class="form-check-label">Tampilkan ke publik</label>
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection