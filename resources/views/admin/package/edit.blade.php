@extends('admin.layout')

@section('content')
<h4>Edit Paket</h4>

<form action="{{ route('admin.package.update', $package->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label class="form-label">Nama Paket</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
               value="{{ old('name', $package->name) }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                  rows="4">{{ old('description', $package->description) }}</textarea>
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Durasi (menit)</label>
            <input type="number" name="duration" class="form-control @error('duration') is-invalid @enderror" 
                   value="{{ old('duration', $package->duration) }}" placeholder="Opsional">
            @error('duration')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" 
                   value="{{ old('price', $package->price) }}" placeholder="Opsional">
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Maks Orang</label>
            <input type="number" name="max_people" class="form-control @error('max_people') is-invalid @enderror" 
                   value="{{ old('max_people', $package->max_people) }}" placeholder="Opsional">
            @error('max_people')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Gambar</label>
        @if($package->image)
        <div class="mb-2">
            <img src="{{ asset('storage/'.$package->image) }}" width="150" class="img-thumbnail">
        </div>
        @endif
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <hr>
    <h5 class="mb-3">Fitur Tambahan (Opsional)</h5>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Jumlah Tema</label>
            <input type="number" name="theme_count" class="form-control @error('theme_count') is-invalid @enderror" 
                   value="{{ old('theme_count', $package->theme_count) }}" placeholder="Kosongkan jika tidak ada" min="0">
            @error('theme_count')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Jumlah Cetak Foto</label>
            <input type="number" name="print_count" class="form-control @error('print_count') is-invalid @enderror" 
                   value="{{ old('print_count', $package->print_count) }}" placeholder="Kosongkan jika tidak ada" min="0">
            @error('print_count')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Jumlah Edited File</label>
            <input type="number" name="edited_count" class="form-control @error('edited_count') is-invalid @enderror" 
                   value="{{ old('edited_count', $package->edited_count) }}" placeholder="Kosongkan jika tidak ada" min="0">
            @error('edited_count')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="has_gdrive" id="has_gdrive" 
                   value="1" {{ old('has_gdrive', $package->has_gdrive) ? 'checked' : '' }}>
            <label class="form-check-label" for="has_gdrive">
                All File by G.Drive
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.package.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection