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
        <h4>Kelola Jam Booking</h4>

        <div>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bulkModal">
                Tambah Massal
            </button>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Tambah Jam
            </button>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">

            <!-- SCROLL AREA -->
            <div style="max-height:400px;overflow-y:auto;">

                <table class="table table-bordered mb-0">
                    <thead class="table-dark sticky-top">
                        <tr>
                            <th width="50">No</th>
                            <th>Jam</th>
                            <th width="120">Status</th>
                            <th width="250">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($timeSlots as $slot)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('H:i',strtotime($slot->time)) }}</td>

                            <td>
                                @if($slot->is_active)
                                <span class="badge bg-success">Aktif</span>
                                @else
                                <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>

                            <td class="d-flex gap-1">

                                <button class="btn btn-info btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $slot->id }}">
                                    Edit
                                </button>

                                <form method="POST" action="/admin/timeslots/{{ $slot->id }}/toggle">
                                    @csrf
                                    <button class="btn btn-warning btn-sm">Toggle</button>
                                </form>

                                <form method="POST" action="/admin/timeslots/{{ $slot->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus jam?')">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>

                        <!-- EDIT MODAL -->
                        <div class="modal fade" id="editModal{{ $slot->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <form method="POST" action="/admin/timeslots/{{ $slot->id }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-header">
                                            <h5>Edit Jam</h5>
                                            <button class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <input type="time"
                                                name="time"
                                                class="form-control"
                                                value="{{ date('H:i',strtotime($slot->time)) }}"
                                                required>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary">Update</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">
                                Belum ada jam
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<!-- ADD MODAL -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="/admin/timeslots">
                @csrf

                <div class="modal-header">
                    <h5>Tambah Jam</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="time" name="time" class="form-control" required>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- BULK MODAL -->
<div class="modal fade" id="bulkModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="/admin/timeslots/bulk">
                @csrf

                <div class="modal-header">
                    <h5>Tambah Jam Massal</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-2">
                        <label>Mulai</label>
                        <input type="time" name="start_time" class="form-control" value="09:00">
                    </div>

                    <div class="mb-2">
                        <label>Selesai</label>
                        <input type="time" name="end_time" class="form-control" value="21:00">
                    </div>

                    <div class="mb-2">
                        <label>Interval</label>
                        <select name="interval" class="form-control">
                            <option value="15">15 Menit</option>
                            <option value="30" selected>30 Menit</option>
                            <option value="60">60 Menit</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-success">Buat</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection