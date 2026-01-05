@extends('admin.layout')

@section('content')
<h4>Edit User</h4>

<form method="POST" action="/admin/user/{{ $user->id }}">
    @csrf
    @method('PUT')

    <input class="form-control mb-2" name="name" value="{{ $user->name }}">
    <input class="form-control mb-2" name="email" value="{{ $user->email }}">
    <input class="form-control mb-2" name="password" placeholder="Password baru (opsional)">

    <select name="role" class="form-control mb-3">
        <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
        <option value="user" {{ $user->role=='user'?'selected':'' }}>User</option>
    </select>

    <button class="btn btn-primary">Update</button>
</form>
@endsection