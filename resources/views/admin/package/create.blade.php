@extends('admin.layout')

@section('content')
<h4>Tambah Paket</h4>

<form method="POST" action="{{ route('admin.package.store') }}">
    @csrf

    <p>nama paket</p>
    <input class="form-control mb-2" name="name" placeholder="Nama Paket">
    <p>deskripsi</p>
    <textarea class="form-control mb-2" name="description"></textarea>
    <p>durasi</p>
    <input type="number" class="form-control mb-2" name="duration">
    <p>harga</p>
    <input type="number" class="form-control mb-2" name="price">
    <p>maksimal orang</p>
    <input type="number" class="form-control mb-3" name="max_people">

    <button class="btn btn-success">Simpan</button>
</form>
@endsection