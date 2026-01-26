@extends('admin.layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold">Galeri Foto</h4>

    <a href="{{ route('admin.gallery.create') }}"
        class="btn btn-primary">
        + Tambah Foto
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-bordered table-hover mb-0 align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th width="60">No</th>
                    <th width="120">Foto</th>
                    <th>Judul</th>
                    <th width="130">Kategori</th>
                    <th width="100">Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galleries as $g)
                <tr>
                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="text-center">
                        <img
                            src="{{ asset('storage/'.$g->image) }}"
                            class="img-thumbnail"
                            style="width:90px; height:70px; object-fit:cover;">
                    </td>

                    <td>
                        {{ $g->title }}
                    </td>

                    <td class="text-center">
                        <span class="badge bg-info text-dark">
                            {{ ucfirst($g->category) }}
                        </span>
                    </td>

                    <td class="text-center">
                        @if($g->is_public)
                        <span class="badge bg-success">Public</span>
                        @else
                        <span class="badge bg-secondary">Private</span>
                        @endif
                    </td>

                    <td class="text-center">
                        <a href="{{ route('admin.gallery.edit', $g->id) }}"
                            class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.gallery.destroy', $g->id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Yakin hapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">
                        Belum ada foto di galeri 📷
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection