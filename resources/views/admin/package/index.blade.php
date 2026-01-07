@extends('admin.layout')

@section('content')
<h4>Paket & Harga</h4>

<a href="/admin/package/create" class="btn btn-primary mb-3">Tambah Paket</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Paket</th>
            <th>Durasi (menit)</th>
            <th>Harga</th>
            <th>Maks Orang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($packages as $i => $p)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->duration }}</td>
            <td>Rp {{ number_format($p->price) }}</td>
            <td>{{ $p->max_people }}</td>
            <td>
                <a href="/admin/package/{{ $p->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                <form action="/admin/package/{{ $p->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus paket ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection