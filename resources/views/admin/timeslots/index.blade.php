@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <!-- Alert Success -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Alert Container (untuk AJAX) -->
    <div id="alertContainer"></div>

    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="mb-1">
                <i class="bi bi-clock" style="color: #6b7280;"></i> Kelola Jam Booking
            </h3>
            <p class="text-muted mb-0">Atur jam-jam yang tersedia untuk booking customer</p>
        </div>
        <div class="col-md-4 text-end">
            <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#bulkModal">
                <i class="bi bi-clock-history"></i> Tambah Massal
            </button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-circle"></i> Tambah Jam
            </button>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            @if($timeSlots->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead style="background: #2d3748; color: white;">
                        <tr>
                            <th class="text-center" style="width: 60px;">No</th>
                            <th style="width: 200px;">Jam</th>
                            <th class="text-center" style="width: 150px;">Status</th>
                            <th class="text-center" style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($timeSlots as $index => $slot)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>
                                <strong style="font-size: 1.1rem;">{{ date('H:i', strtotime($slot->time)) }}</strong>
                            </td>
                            <td class="text-center">
                                @if($slot->is_active)
                                <span class="badge" style="background: #10b981; font-size: 0.85rem;">
                                    <i class="bi bi-check-circle"></i> Aktif
                                </span>
                                @else
                                <span class="badge" style="background: #6b7280; font-size: 0.85rem;">
                                    <i class="bi bi-x-circle"></i> Nonaktif
                                </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info" 
                                        onclick="editTimeSlot({{ $slot->id }}, '{{ date('H:i', strtotime($slot->time)) }}')"
                                        style="padding: 0.25rem 0.75rem;">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-{{ $slot->is_active ? 'warning' : 'success' }}" 
                                        onclick="toggleTimeSlot({{ $slot->id }})"
                                        style="padding: 0.25rem 0.75rem;">
                                    <i class="bi bi-toggle-{{ $slot->is_active ? 'on' : 'off' }}"></i> 
                                    {{ $slot->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                </button>
                                <button class="btn btn-sm btn-danger" 
                                        onclick="deleteTimeSlot({{ $slot->id }})"
                                        style="padding: 0.25rem 0.75rem;">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-5">
                <div style="color: #9ca3af;">
                    <i class="bi bi-clock" style="font-size: 3rem;"></i>
                    <p class="mt-2">Belum ada jam tersedia</p>
                    <p class="text-muted small">Klik tombol "Tambah Jam" atau "Tambah Massal" untuk menambahkan jam booking</p>
                    <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#bulkModal">
                        <i class="bi bi-clock-history"></i> Tambah Jam Massal
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Add Time Slot Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background: #3b82f6; color: white;">
                <h5 class="modal-title">
                    <i class="bi bi-plus-circle"></i> Tambah Jam Booking
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="addForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"><strong>Jam</strong> <span class="text-danger">*</span></label>
                        <input type="time" class="form-control" name="time" required>
                        <small class="text-muted">Pilih jam yang ingin ditambahkan (contoh: 09:00, 14:30, 20:00)</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Time Slot Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background: #3b82f6; color: white;">
                <h5 class="modal-title">
                    <i class="bi bi-pencil"></i> Edit Jam Booking
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_id" name="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"><strong>Jam</strong> <span class="text-danger">*</span></label>
                        <input type="time" class="form-control" id="edit_time" name="time" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bulk Add Modal -->
<div class="modal fade" id="bulkModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background: #10b981; color: white;">
                <h5 class="modal-title">
                    <i class="bi bi-clock-history"></i> Tambah Jam Massal
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="bulkForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"><strong>Jam Mulai</strong> <span class="text-danger">*</span></label>
                        <input type="time" class="form-control" name="start_time" value="09:00" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Jam Selesai</strong> <span class="text-danger">*</span></label>
                        <input type="time" class="form-control" name="end_time" value="21:00" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Interval (menit)</strong> <span class="text-danger">*</span></label>
                        <select class="form-control" name="interval" required>
                            <option value="15">15 menit</option>
                            <option value="30" selected>30 menit</option>
                            <option value="60">60 menit</option>
                        </select>
                    </div>
                    <div class="alert alert-info mb-0">
                        <i class="bi bi-info-circle"></i> 
                        <strong>Contoh:</strong> Jam 09:00 s/d 21:00 dengan interval 30 menit akan membuat: 09:00, 09:30, 10:00, ... 21:00
                        <br><small class="text-muted">* Jam yang sudah ada akan dilewati</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Buat Jam
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// CSRF Token
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Show Alert
function showAlert(message, type = 'success') {
    const alertHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            <strong>${type === 'success' ? 'Berhasil!' : 'Error!'}</strong> ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `;
    document.getElementById('alertContainer').innerHTML = alertHTML;
    
    setTimeout(() => {
        const alert = document.querySelector('#alertContainer .alert');
        if (alert) alert.remove();
    }, 5000);
}

// Add Time Slot
document.getElementById('addForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalHTML = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Menyimpan...';
    
    fetch('/admin/timeslots', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token,
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            showAlert(data.message, 'success');
            bootstrap.Modal.getInstance(document.getElementById('addModal')).hide();
            setTimeout(() => location.reload(), 1000);
        } else {
            showAlert(data.message, 'danger');
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalHTML;
        }
    })
    .catch(err => {
        showAlert('Terjadi kesalahan', 'danger');
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalHTML;
    });
});

// Edit Time Slot
function editTimeSlot(id, time) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_time').value = time;
    
    new bootstrap.Modal(document.getElementById('editModal')).show();
}

document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const id = document.getElementById('edit_id').value;
    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalHTML = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Menyimpan...';
    
    fetch(`/admin/timeslots/${id}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token,
            'X-HTTP-Method-Override': 'PUT'
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            showAlert(data.message, 'success');
            bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
            setTimeout(() => location.reload(), 1000);
        } else {
            showAlert(data.message, 'danger');
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalHTML;
        }
    })
    .catch(err => {
        showAlert('Terjadi kesalahan', 'danger');
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalHTML;
    });
});

// Toggle Status
function toggleTimeSlot(id) {
    if (confirm('Yakin ingin mengubah status jam ini?')) {
        fetch(`/admin/timeslots/${id}/toggle`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showAlert(data.message, 'success');
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'danger');
            }
        })
        .catch(err => showAlert('Terjadi kesalahan', 'danger'));
    }
}

// Delete Time Slot
function deleteTimeSlot(id) {
    if (confirm('Yakin ingin menghapus jam ini? Tindakan ini tidak bisa dibatalkan!')) {
        fetch(`/admin/timeslots/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showAlert(data.message, 'success');
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'danger');
            }
        })
        .catch(err => showAlert('Terjadi kesalahan', 'danger'));
    }
}

// Bulk Create
document.getElementById('bulkForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalHTML = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Membuat...';
    
    fetch('/admin/timeslots/bulk', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token,
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            showAlert(data.message, 'success');
            bootstrap.Modal.getInstance(document.getElementById('bulkModal')).hide();
            setTimeout(() => location.reload(), 1000);
        } else {
            showAlert(data.message, 'danger');
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalHTML;
        }
    })
    .catch(err => {
        showAlert('Terjadi kesalahan', 'danger');
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalHTML;
    });
});

// Debug: Cek Bootstrap loaded
document.addEventListener('DOMContentLoaded', function() {
    if (typeof bootstrap === 'undefined') {
        console.error('Bootstrap JS belum loaded! Modal tidak akan berfungsi.');
    } else {
        console.log('Bootstrap JS loaded successfully');
    }
});
</script>
@endpush