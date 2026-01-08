@extends('admin.layout')

@section('content')
<h4>Jadwal Studio</h4>

<a href="/admin/schedule/create" class="btn btn-primary mb-3">Tambah Jadwal</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($schedules as $i => $s)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $s->date }}</td>
            <td>{{ $s->time }}</td>
            <td>
                @if($s->is_available)
                <span class="badge bg-success">Tersedia</span>
                @else
                <span class="badge bg-danger">Tidak Tersedia</span>
                @endif
            </td>
            <td>
                <a href="/admin/schedule/{{ $s->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                <form action="/admin/schedule/{{ $s->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus jadwal ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection