@extends('admin.layout')

@section('content')
<h4>Paket & Harga</h4>

<a href="{{ route('admin.package.create') }}" class="btn btn-primary mb-3">
    Tambah Paket
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Durasi</th>
            <th>Harga</th>
            <th>Maks Orang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($packages as $i => $p)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->duration }} menit</td>
            <td>Rp {{ number_format($p->price,0,',','.') }}</td>
            <td>{{ $p->max_people }}</td>
            <td>
                <a href="{{ route('admin.package.edit',$p->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.package.destroy',$p->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection