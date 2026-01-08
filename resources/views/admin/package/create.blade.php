@extends('admin.layout')

@section('content')
<h4>Tambah Paket</h4>

<form method="POST" action="/admin/package">
    @csrf

    <input class="form-control mb-2" name="name" placeholder="Nama Paket">
    <textarea class="form-control mb-2" name="description" placeholder="Deskripsi"></textarea>
    <input class="form-control mb-2" name="duration" placeholder="Durasi (menit)">
    <input class="form-control mb-2" name="price" placeholder="Harga">
    <input class="form-control mb-3" name="max_people" placeholder="Maksimal Orang">

    <button class="btn btn-success">Simpan</button>
</form>
@endsection