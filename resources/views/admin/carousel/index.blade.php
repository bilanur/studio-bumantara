@extends('admin.layout')

@section('content')
<h4>Carousel Website</h4>

<form action="/admin/carousel" method="POST" enctype="multipart/form-data" class="mb-4">
    @csrf

    <input type="text" name="title" class="form-control mb-2"
        placeholder="Judul (opsional)">

    <input type="file" name="image" class="form-control mb-2" required>

    <div class="form-check mb-3">
        <input type="checkbox" name="is_active" class="form-check-input" checked>
        <label class="form-check-label">Aktifkan</label>
    </div>

    <button class="btn btn-success">Tambah Carousel</button>
</form>

<div class="row">
    @foreach($carousels as $c)
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="{{ asset('storage/'.$c->image) }}"
                class="card-img-top"
                style="height:180px; object-fit:cover">

            <div class="card-body text-center">
                <strong>{{ $c->title }}</strong><br>

                @if($c->is_active)
                <span class="badge bg-success">Aktif</span>
                @else
                <span class="badge bg-secondary">Nonaktif</span>
                @endif

                <form action="/admin/carousel/{{ $c->id }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus foto ini?')">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection