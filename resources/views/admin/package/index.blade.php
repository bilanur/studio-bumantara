@extends('admin.layout')

@section('content')
<h4>Paket & Harga</h4>

<a href="{{ route('admin.package.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Tambah Paket
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Gambar</th>
            <th class="text-center">Durasi</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Maks Orang</th>
            <th class="text-center">Fitur Tambahan</th>
            <th class="text-center" width="180">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($packages as $i => $p)
        <tr>
            <td class="text-center">{{ $i + 1 }}</td>
            <td>{{ $p->name ?? '-' }}</td>
            <td class="text-center">
                @if($p->image)
                <img src="{{ asset('storage/'.$p->image) }}" width="80" class="rounded">
                @else
                -
                @endif
            </td>
            <td class="text-center">{{ $p->duration ? $p->duration . ' menit' : '-' }}</td>
            <td>{{ $p->price ? 'Rp ' . number_format($p->price,0,',','.') : '-' }}</td>
            <td class="text-center">{{ $p->max_people ?? '-' }}</td>
            <td>
                @if($p->theme_count)
                <span class="badge bg-info">{{ $p->theme_count }} Tema</span>
                @endif
                @if($p->print_count)
                <span class="badge bg-warning text-dark">Cetak {{ $p->print_count }} Foto</span>
                @endif
                @if($p->edited_count)
                <span class="badge bg-primary">{{ $p->edited_count }} Edited File</span>
                @endif
                @if($p->has_gdrive)
                <span class="badge bg-success">G.Drive</span>
                @endif
                @if(!$p->theme_count && !$p->print_count && !$p->edited_count && !$p->has_gdrive)
                <span class="text-muted">-</span>
                @endif
            </td>
            <td class="text-center">
                <a href="{{ route('admin.package.edit',$p->id) }}" 
                   class="btn btn-warning btn-sm me-1" 
                   title="Edit paket">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
                
                <form action="{{ route('admin.package.destroy',$p->id) }}" 
                      method="POST" 
                      class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" 
                            onclick="return confirm('Yakin hapus paket ini?')"
                            title="Hapus paket">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection