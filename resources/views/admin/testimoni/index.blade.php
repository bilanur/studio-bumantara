@extends('admin.layout')

@section('content')
<h4>Data Testimoni</h4>

<form action="/admin/testimoni" method="POST" enctype="multipart/form-data" class="mb-4">
    @csrf

    <select name="user_id" class="form-control mb-2" required>
        <option value="">-- Pilih User --</option>
        @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>


    <input type="number" name="rating" class="form-control mb-2" placeholder="Rating (1-5)">
    <textarea name="comment" class="form-control mb-2" placeholder="Komentar"></textarea>
    <input type="file" name="image" class="form-control mb-2">

    <div class="form-check mb-2">
        <input type="checkbox" name="is_show" class="form-check-input" checked>
        <label class="form-check-label">Tampilkan</label>
    </div>

    <button class="btn btn-success">Tambah Testimoni</button>
</form>

<table class="table table-bordered">
    <tr>
        <th>User</th>
        <th>Rating</th>
        <th>Komentar</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($testimonis as $t)
    <tr>
        <td>{{ $t->user->name }}</td>
        <td>{{ $t->rating }} ⭐</td>
        <td>{{ $t->comment }}</td>
        <td>
            {{ $t->is_show ? 'Tampil' : 'Disembunyikan' }}
        </td>
        <td>
            <a href="/admin/testimoni/{{ $t->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

            <form action="/admin/testimoni/{{ $t->id }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Hapus testimoni ini?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection