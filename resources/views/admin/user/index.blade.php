@extends('admin.layout')

@section('content')
<h4>Data User</h4>

<a href="/admin/user/create" class="btn btn-primary mb-3">Tambah User</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $i => $user)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <span class="badge bg-info">{{ $user->role }}</span>
            </td>
            <td>
                <a href="/admin/user/{{ $user->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                <form action="/admin/user/{{ $user->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus user ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection