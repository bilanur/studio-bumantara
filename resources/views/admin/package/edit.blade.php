@extends('admin.layout')

@section('content')
<h4>Edit Paket</h4>

<form method="POST" action="/admin/package/{{ $package->id }}">
    @csrf
    @method('PUT')

    <input class="form-control mb-2" name="name" value="{{ $package->name }}">
    <textarea class="form-control mb-2" name="description">{{ $package->description }}</textarea>
    <input class="form-control mb-2" name="duration" value="{{ $package->duration }}">
    <input class="form-control mb-2" name="price" value="{{ $package->price }}">
    <input class="form-control mb-3" name="max_people" value="{{ $package->max_people }}">

    <button class="btn btn-primary">Update</button>
</form>
@endsection