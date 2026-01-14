@extends('admin.layout')

@section('content')
<h4>Edit Paket</h4>

<form method="POST" action="{{ route('admin.package.update',$package->id) }}">
    @csrf
    @method('PUT')

    <p>nama paket</p>
    <input class="form-control mb-2" name="name" value="{{ $package->name }}">
    <p>deskripsi</p>
    <textarea class="form-control mb-2" name="description">{{ $package->description }}</textarea>
    <p>durasi</p>
    <input type="number" class="form-control mb-2" name="duration" value="{{ $package->duration }}">
    <p>harga</p>
    <input type="number" class="form-control mb-2" name="price" value="{{ $package->price }}">
    <p>maksimal orang</p>
    <input type="number" class="form-control mb-3" name="max_people" value="{{ $package->max_people }}">

    <button class="btn btn-primary">Update</button>
</form>
@endsection