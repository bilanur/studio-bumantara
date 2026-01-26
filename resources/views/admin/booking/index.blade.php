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

    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="mb-1">
                <i class="bi bi-clipboard-data" style="color: #6b7280;"></i> Data Booking
            </h3>
            <p class="text-muted mb-0">Kelola semua booking pelanggan</p>
        </div>
        <div class="col-md-4 text-end">
            <span class="badge bg-primary" style="font-size: 1rem; padding: 0.5rem 1rem;">
                Total: {{ $bookings->total() }} booking
            </span>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead style="background: #2d3748; color: white;">
                        <tr>
                            <th class="text-center" style="width: 60px;">No</th>
                            <th style="width: 140px;">Kode Booking</th>
                            <th style="width: 200px;">Customer</th>
                            <th style="width: 120px;">Paket</th>
                            <th style="width: 150px;">Jadwal</th>
                            <th class="text-end" style="width: 120px;">Total</th>
                            <th class="text-center" style="width: 120px;">Status Booking</th>
                            <th class="text-center" style="width: 120px;">Status Bayar</th>
                            <th class="text-center" style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $index => $booking)
                        <tr>
                            <td class="text-center">{{ $bookings->firstItem() + $index }}</td>
                            <td>
                                <span class="badge" style="background: #3b82f6; font-size: 0.85rem;">
                                    {{ $booking->kode_booking }}
                                </span>
                            </td>
                            <td>
                                <div>
                                    <strong>{{ $booking->nama_pelanggan }}</strong><br>
                                    <small class="text-muted">{{ $booking->email }}</small><br>
                                    <small class="text-muted">{{ $booking->nomor_telepon }}</small>
                                </div>
                            </td>
                            <td>{{ $booking->package->name ?? '-' }}</td>
                            <td>
                                <div>
                                    {{ \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') }}<br>
                                    <small class="text-muted">{{ date('H:i', strtotime($booking->waktu)) }} {{ $booking->zona_waktu }}</small>
                                </div>
                            </td>
                            <td class="text-end">
                                <strong style="color: #16a34a;">Rp {{ number_format($booking->total_pembayaran, 0, ',', '.') }}</strong>
                            </td>
                            <td class="text-center">
                                @php
                                    $statusMap = [
                                        'Menunggu Pembayaran' => ['bg' => '#f59e0b', 'text' => 'Menunggu'],
                                        'Dikonfirmasi' => ['bg' => '#3b82f6', 'text' => 'Dikonfirmasi'],
                                        'Selesai' => ['bg' => '#10b981', 'text' => 'Selesai'],
                                        'Batal' => ['bg' => '#ef4444', 'text' => 'Batal'],
                                        'Expired' => ['bg' => '#6b7280', 'text' => 'Expired'],
                                    ];
                                    $status = $statusMap[$booking->status] ?? ['bg' => '#6b7280', 'text' => $booking->status];
                                @endphp
                                <span class="badge" style="background: {{ $status['bg'] }}; font-size: 0.85rem;">
                                    {{ $status['text'] }}
                                </span>
                            </td>
                            <td class="text-center">
                                @php
                                    $statusBayar = $booking->status_pembayaran ?? 'Belum Lunas';
                                    $bayarMap = [
                                        'Lunas' => ['bg' => '#10b981', 'text' => 'Lunas'],
                                        'Belum Lunas' => ['bg' => '#f59e0b', 'text' => 'Belum Lunas'],
                                    ];
                                    $bayar = $bayarMap[$statusBayar] ?? ['bg' => '#6b7280', 'text' => $statusBayar];
                                @endphp
                                <span class="badge" style="background: {{ $bayar['bg'] }}; font-size: 0.85rem;">
                                    {{ $bayar['text'] }}
                                </span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info" 
                                        type="button"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#detailModal{{ $booking->id }}"
                                        style="padding: 0.25rem 0.75rem;">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div style="color: #9ca3af;">
                                    <i class="bi bi-inbox" style="font-size: 3rem;"></i>
                                    <p class="mt-2">Belum ada data booking</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($bookings->hasPages())
        <div class="card-footer bg-light">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    Menampilkan {{ $bookings->firstItem() }}-{{ $bookings->lastItem() }} dari {{ $bookings->total() }}
                </small>
                {{ $bookings->links() }}
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Modals Detail & Update Status -->
@foreach($bookings as $booking)
<div class="modal fade" id="detailModal{{ $booking->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $booking->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background: #3b82f6; color: white;">
                <h5 class="modal-title" id="detailModalLabel{{ $booking->id }}">
                    <i class="bi bi-clipboard-check"></i> Detail Booking - {{ $booking->kode_booking }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="border-bottom pb-2 mb-3" style="color: #2d3748;">
                            <i class="bi bi-person-circle" style="color: #6b7280;"></i> Data Customer
                        </h6>
                        <table class="table table-sm table-borderless">
                            <tr><td width="100"><strong>Nama</strong></td><td>: {{ $booking->nama_pelanggan }}</td></tr>
                            <tr><td><strong>Email</strong></td><td>: {{ $booking->email }}</td></tr>
                            <tr><td><strong>Telepon</strong></td><td>: {{ $booking->nomor_telepon }}</td></tr>
                            <tr><td><strong>Sosmed</strong></td><td>: {{ $booking->izin_sosmed }}</td></tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6 class="border-bottom pb-2 mb-3" style="color: #2d3748;">
                            <i class="bi bi-camera" style="color: #6b7280;"></i> Detail Paket
                        </h6>
                        <table class="table table-sm table-borderless">
                            <tr><td width="100"><strong>Paket</strong></td><td>: {{ $booking->package->name ?? '-' }}</td></tr>
                            <tr><td><strong>Tanggal</strong></td><td>: {{ \Carbon\Carbon::parse($booking->tanggal)->format('d F Y') }}</td></tr>
                            <tr><td><strong>Waktu</strong></td><td>: {{ date('H:i', strtotime($booking->waktu)) }} {{ $booking->zona_waktu }}</td></tr>
                            <tr><td><strong>Durasi</strong></td><td>: {{ $booking->durasi }}</td></tr>
                            <tr><td><strong>Extra</strong></td><td>: {{ $booking->extra_people }} orang</td></tr>
                        </table>
                    </div>
                </div>
                <hr>
                <h6 class="mb-3" style="color: #2d3748;">
                    <i class="bi bi-cash-coin" style="color: #6b7280;"></i> Rincian Pembayaran
                </h6>
                <table class="table table-sm">
                    <tr><td>Harga Paket</td><td class="text-end">Rp {{ number_format($booking->harga_paket, 0, ',', '.') }}</td></tr>
                    <tr><td>Extra People</td><td class="text-end">Rp {{ number_format($booking->harga_extra_people, 0, ',', '.') }}</td></tr>
                    <tr style="background: #f3f4f6;">
                        <td><strong>Total</strong></td>
                        <td class="text-end"><strong style="color: #16a34a;">Rp {{ number_format($booking->total_pembayaran, 0, ',', '.') }}</strong></td>
                    </tr>
                    <tr>
                        <td>Metode Bayar</td>
                        <td class="text-end"><span class="badge bg-secondary">{{ $booking->metode_pembayaran }}</span></td>
                    </tr>
                    <tr>
                        <td>Status Pembayaran</td>
                        <td class="text-end">
                            @php
                                $statusBayar = $booking->status_pembayaran ?? 'Belum Lunas';
                                $bayarMap = [
                                    'Lunas' => ['bg' => '#10b981', 'text' => 'Lunas'],
                                    'Belum Lunas' => ['bg' => '#f59e0b', 'text' => 'Belum Lunas'],
                                ];
                                $bayar = $bayarMap[$statusBayar] ?? ['bg' => '#6b7280', 'text' => $statusBayar];
                            @endphp
                            <span class="badge" style="background: {{ $bayar['bg'] }};">{{ $bayar['text'] }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Status Booking</td>
                        <td class="text-end">
                            @php
                                $statusMap = [
                                    'Menunggu Pembayaran' => ['bg' => '#f59e0b', 'text' => 'Menunggu'],
                                    'Dikonfirmasi' => ['bg' => '#3b82f6', 'text' => 'Dikonfirmasi'],
                                    'Selesai' => ['bg' => '#10b981', 'text' => 'Selesai'],
                                    'Batal' => ['bg' => '#ef4444', 'text' => 'Batal'],
                                    'Expired' => ['bg' => '#6b7280', 'text' => 'Expired'],
                                ];
                                $status = $statusMap[$booking->status] ?? ['bg' => '#6b7280', 'text' => $booking->status];
                            @endphp
                            <span class="badge" style="background: {{ $status['bg'] }};">{{ $status['text'] }}</span>
                        </td>
                    </tr>
                </table>

                <!-- Form Update Status Pembayaran -->
                @if(($booking->status_pembayaran ?? 'Belum Lunas') == 'Belum Lunas')
                <hr>
                <div class="alert alert-warning mb-3">
                    <i class="bi bi-credit-card"></i> <strong>Update Status Pembayaran</strong>
                    <p class="mb-0 small">Ubah status pembayaran booking ini</p>
                </div>
                <form action="{{ route('admin.booking.update-payment', $booking->id) }}" method="POST" class="mb-3">
                    @csrf
                    @method('PUT')
                    <div class="row g-2">
                        <div class="col-md-8">
                            <select name="status_pembayaran" class="form-select" required>
                                <option value="">-- Pilih Status Pembayaran --</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Belum Lunas">Belum Lunas</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="bi bi-check-circle"></i> Update Bayar
                            </button>
                        </div>
                    </div>
                </form>
                @endif

                <!-- Form Update Status Booking -->
                @if($booking->status == 'Menunggu Pembayaran')
                <hr>
                <div class="alert alert-info mb-3">
                    <i class="bi bi-lightning"></i> <strong>Update Status Booking</strong>
                    <p class="mb-0 small">Konfirmasi atau batalkan booking ini</p>
                </div>
                <form action="{{ route('admin.booking.update-status', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-2 mb-2">
                        <div class="col-md-8">
                            <select name="status" class="form-select" required>
                                <option value="">-- Pilih Status Booking --</option>
                                <option value="Dikonfirmasi">Konfirmasi Booking</option>
                                <option value="Batal">Batalkan Booking</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-arrow-repeat"></i> Update Status
                            </button>
                        </div>
                    </div>
                    <textarea name="catatan" class="form-control form-control-sm" rows="2" placeholder="Catatan (opsional)"></textarea>
                </form>
                @elseif($booking->status == 'Dikonfirmasi')
                <hr>
                <div class="alert alert-success mb-3">
                    <i class="bi bi-check-circle"></i> <strong>Booking Dikonfirmasi</strong>
                    <p class="mb-0 small">Booking sudah dikonfirmasi dan menunggu jadwal pelaksanaan</p>
                </div>
                <form action="{{ route('admin.booking.update-status', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-2">
                        <div class="col-md-8">
                            <select name="status" class="form-select" required>
                                <option value="">-- Ubah Status Booking --</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Batal">Batalkan</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-arrow-repeat"></i> Update
                            </button>
                        </div>
                    </div>
                </form>
                @else
                <hr>
                <div class="alert alert-secondary">
                    <i class="bi bi-info-circle"></i> <strong>Status: {{ $booking->status }}</strong>
                    <p class="mb-0 small">Booking ini sudah tidak dapat diubah statusnya</p>
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@push('scripts')
<script>
// Debug: Cek apakah Bootstrap loaded
document.addEventListener('DOMContentLoaded', function() {
    if (typeof bootstrap === 'undefined') {
        console.error('Bootstrap JS belum loaded! Modal tidak akan berfungsi.');
    } else {
        console.log('Bootstrap JS loaded successfully');
    }
});
</script>
@endpush