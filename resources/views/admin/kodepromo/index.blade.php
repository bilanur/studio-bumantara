@extends('admin.layout')

@section('content')
<div class="container-fluid">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h4>Kelola Kode Promo</h4>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Tambah Kode
        </button>
    </div>

    <div class="card">
        <div class="card-body p-0">

            <div style="max-height:400px; overflow-y:auto;">

                <table class="table table-bordered mb-0">
                    <thead class="table-dark sticky-top">
                        <tr>
                            <th width="50">No</th>
                            <th>Kode</th>
                            <th>Potongan</th>
                            <th>Status</th>
                            <th width="220">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($codes as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $row->code }}</strong></td>

                            <td>
                                Rp {{ number_format($row->discount,0,',','.') }}
                            </td>

                            <td>
                                @if($row->is_active)
                                <span class="badge bg-success">Aktif</span>
                                @else
                                <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>

                            <td class="d-flex gap-1">

                                <form method="POST" action="/admin/kodepromo/{{ $row->id }}/toggle">
                                    @csrf
                                    <button class="btn btn-warning btn-sm">
                                        Toggle
                                    </button>
                                </form>

                                <form method="POST" action="/admin/kodepromo/{{ $row->id }}">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Hapus kode promo?')" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                Belum ada kode promo
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>

<!-- MODAL ADD -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="/admin/kodepromo">
                @csrf

                <div class="modal-header">
                    <h5>Tambah Kode Promo</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Kode Promo</label>
                        <input name="code" class="form-control" required placeholder="PROMO10">
                    </div>

                    <div class="mb-3">
                        <label>Potongan (Rp)</label>
                        <input type="number" name="discount" class="form-control" required placeholder="10000">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection