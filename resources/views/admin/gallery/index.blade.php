@extends('admin.layout')

@section('content')
<h4>Galeri Studio</h4>

<a href="/admin/gallery/create" class="btn btn-primary mb-3">Tambah Foto</a>

<div class="row">
    @foreach($galleries as $g)
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="{{ asset('storage/'.$g->image) }}" class="card-img-top" style="height:180px; object-fit:cover">
            <div class="card-body">
                <h6>{{ $g->title }}</h6>
                <small>{{ $g->category }}</small><br>

                @if($g->is_public)
                <span class="badge bg-success">Public</span>
                @else
                <span class="badge bg-secondary">Private</span>
                @endif

                <div class="mt-2">
                    <a href="/admin/gallery/{{ $g->id }}/edit" class="btn btn-sm btn-warning">Edit</a>

                    <form action="/admin/gallery/{{ $g->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Hapus foto ini?')">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection