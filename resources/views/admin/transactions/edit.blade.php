@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <!-- Back Button -->
    <div class="mb-3">
        <a href="{{ route('admin.transactions.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Transaksi
        </a>
    </div>

    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h3 class="mb-1">
                <i class="bi bi-cloud-upload" style="color: #2B4D62;"></i> 
                {{ $transaction->drive_link ? 'Edit' : 'Upload' }} Link Google Drive
            </h3>
            <p class="text-muted mb-0">Upload atau update link Google Drive untuk customer</p>
        </div>
    </div>

    <div class="row">
        <!-- Info Transaksi Card -->
        <div class="col-md-5">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header" style="background: #2B4D62; color: white;">
                    <h6 class="mb-0">
                        <i class="bi bi-info-circle"></i> Informasi Transaksi
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless mb-0">
                        <tr>
                            <td width="140"><strong>No Transaksi</strong></td>
                            <td>: <span class="badge" style="background: #2B4D62;">{{ $transaction->transaction_number }}</span></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Customer</strong></td>
                            <td>: {{ $transaction->customer_name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>: {{ $transaction->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>No Telepon</strong></td>
                            <td>: {{ $transaction->phone }}</td>
                        </tr>
                        <tr>
                            <td><strong>Paket</strong></td>
                            <td>: {{ $transaction->package_name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Booking</strong></td>
                            <td>: {{ $transaction->formatted_booking_date }}</td>
                        </tr>
                        <tr>
                            <td><strong>Total Pembayaran</strong></td>
                            <td>: <strong style="color: #16a34a;">Rp {{ number_format($transaction->total_payment, 0, ',', '.') }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong></td>
                            <td>: 
                                @php
                                    $statusMap = [
                                        'completed' => ['bg' => '#10b981', 'text' => 'Selesai'],
                                        'pending' => ['bg' => '#f59e0b', 'text' => 'Menunggu'],
                                        'cancelled' => ['bg' => '#ef4444', 'text' => 'Batal'],
                                    ];
                                    $status = $statusMap[$transaction->status] ?? ['bg' => '#6b7280', 'text' => $transaction->status];
                                @endphp
                                <span class="badge" style="background: {{ $status['bg'] }};">{{ $status['text'] }}</span>
                            </td>
                        </tr>
                    </table>

                    @if($transaction->drive_link)
                    <hr>
                    <div class="alert alert-info mb-0">
                        <strong><i class="bi bi-link-45deg"></i> Link Saat Ini:</strong><br>
                        <small class="text-break">
                            <a href="{{ $transaction->drive_link }}" target="_blank" style="color: #2B4D62;">
                                {{ Str::limit($transaction->drive_link, 50) }}
                            </a>
                        </small>
                        @if($transaction->expiry_date)
                        <hr class="my-2">
                        <small>
                            <i class="bi bi-clock"></i> 
                            <strong>Berlaku sampai:</strong> {{ $transaction->formatted_expiry_date }}
                        </small>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Form Upload Card -->
        <div class="col-md-7">
            <div class="card border-0 shadow-sm">
                <div class="card-header" style="background: #2B4D62; color: white;">
                    <h6 class="mb-0">
                        <i class="bi bi-cloud-arrow-up"></i> Form Upload Drive Link
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Alert Info -->
                        <div class="alert alert-warning mb-4">
                            <i class="bi bi-exclamation-triangle"></i> <strong>Penting!</strong>
                            <p class="mb-0 small">
                                Pastikan folder Google Drive sudah di-share dengan email customer: 
                                <strong>{{ $transaction->email }}</strong>
                            </p>
                        </div>

                        <!-- Link Google Drive -->
                        <div class="mb-4">
                            <label class="form-label">
                                <i class="bi bi-link"></i> Link Google Drive <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="url" 
                                name="drive_link" 
                                class="form-control @error('drive_link') is-invalid @enderror"
                                placeholder="https://drive.google.com/drive/folders/..."
                                value="{{ old('drive_link', $transaction->drive_link) }}"
                                required
                            >
                            @error('drive_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted d-block mt-1">
                                <i class="bi bi-info-circle"></i> 
                                Salin link folder dari Google Drive dan paste di sini
                            </small>
                        </div>

                        <!-- Masa Berlaku -->
                        <div class="mb-4">
                            <label class="form-label">
                                <i class="bi bi-calendar-check"></i> Masa Berlaku <span class="text-danger">*</span>
                            </label>
                            <select name="expiry_days" class="form-select @error('expiry_days') is-invalid @enderror" required>
                                <option value="">-- Pilih Masa Berlaku --</option>
                                <option value="7" {{ old('expiry_days') == '7' ? 'selected' : '' }}>7 Hari</option>
                                <option value="14" {{ old('expiry_days') == '14' ? 'selected' : '' }}>14 Hari</option>
                                <option value="30" {{ old('expiry_days') == '30' ? 'selected' : '' }}>30 Hari</option>
                            </select>
                            @error('expiry_days')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted d-block mt-1">
                                <i class="bi bi-clock-history"></i> 
                                File akan otomatis kadaluarsa setelah masa berlaku habis
                            </small>
                        </div>

                        <!-- Info Box -->
                        <div class="alert alert-light border mb-4">
                            <h6 class="mb-2"><i class="bi bi-lightbulb"></i> Cara Upload:</h6>
                            <ol class="mb-0 small ps-3">
                                <li>Upload hasil foto ke Google Drive</li>
                                <li>Klik kanan folder → Share → Add people</li>
                                <li>Masukkan email customer: <strong>{{ $transaction->email }}</strong></li>
                                <li>Set permission ke "Viewer"</li>
                                <li>Copy link folder dan paste di form ini</li>
                            </ol>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-lg" style="background: #2B4D62; color: white;">
                                <i class="bi bi-{{ $transaction->drive_link ? 'arrow-repeat' : 'cloud-upload' }}"></i>
                                {{ $transaction->drive_link ? 'Update Link Google Drive' : 'Upload Link Google Drive' }}
                            </button>
                            <a href="{{ route('admin.transactions.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-validate URL format
    const driveInput = document.querySelector('input[name="drive_link"]');
    if (driveInput) {
        driveInput.addEventListener('blur', function() {
            if (this.value && !this.value.includes('drive.google.com')) {
                alert('⚠️ Pastikan link adalah dari Google Drive!');
                this.focus();
            }
        });
    }
});
</script>
@endpush