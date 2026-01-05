@extends('admin.layout')

@section('content')
<h4>Tambah User</h4>

<form method="POST" action="/admin/user">
    @csrf

    <input class="form-control mb-2" name="name" placeholder="Nama">
    <input class="form-control mb-2" name="email" placeholder="Email">
    <input class="form-control mb-2" name="password" placeholder="Password" type="password">

    <select name="role" class="form-control mb-3">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection