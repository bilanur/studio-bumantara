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
                <i class="bi bi-folder2-open" style="color: #6b7280;"></i> Data Transaksi
            </h3>
            <p class="text-muted mb-0">Kelola link Google Drive untuk customer</p>
        </div>
        <div class="col-md-4 text-end">
            <span class="badge bg-primary" style="font-size: 1rem; padding: 0.5rem 1rem;">
                Total: {{ $transactions->total() }} transaksi
            </span>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead style="background: #2B4D62; color: white;">
                        <tr>
                            <th class="text-center" style="width: 60px;">No</th>
                            <th style="width: 140px;">No Transaksi</th>
                            <th style="width: 200px;">Customer</th>
                            <th style="width: 150px;">Paket</th>
                            <th style="width: 130px;">Tanggal Booking</th>
                            <th class="text-end" style="width: 120px;">Total</th>
                            <th class="text-center" style="width: 100px;">Status</th>
                            <th class="text-center" style="width: 120px;">Drive Link</th>
                            <th class="text-center" style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $index => $transaction)
                        <tr>
                            <td class="text-center">{{ $transactions->firstItem() + $index }}</td>
                            <td>
                                <span class="badge" style="background: #2B4D62; font-size: 0.85rem;">
                                    {{ $transaction->transaction_number }}
                                </span>
                            </td>
                            <td>
                                <div>
                                    <strong>{{ $transaction->customer_name }}</strong><br>
                                    <small class="text-muted">{{ $transaction->email }}</small><br>
                                    <small class="text-muted">{{ $transaction->phone }}</small>
                                </div>
                            </td>
                            <td>{{ $transaction->package_name }}</td>
                            <td>
                                <div>
                                    {{ $transaction->formatted_booking_date }}<br>
                                    <small class="text-muted">{{ $transaction->booking_date->diffForHumans() }}</small>
                                </div>
                            </td>
                            <td class="text-end">
                                <strong style="color: #16a34a;">Rp {{ number_format($transaction->total_payment, 0, ',', '.') }}</strong>
                            </td>
                            <td class="text-center">
                                @php
                                    $statusMap = [
                                        'completed' => ['bg' => '#10b981', 'text' => 'Selesai'],
                                        'pending' => ['bg' => '#f59e0b', 'text' => 'Menunggu'],
                                        'cancelled' => ['bg' => '#ef4444', 'text' => 'Batal'],
                                    ];
                                    $status = $statusMap[$transaction->status] ?? ['bg' => '#6b7280', 'text' => $transaction->status];
                                @endphp
                                <span class="badge" style="background: {{ $status['bg'] }}; font-size: 0.85rem;">
                                    {{ $status['text'] }}
                                </span>
                            </td>
                            <td class="text-center">
                                @if($transaction->drive_link)
                                    <span class="badge" style="background: #10b981; font-size: 0.85rem;">
                                        <i class="bi bi-check-circle"></i> Tersedia
                                    </span>
                                @else
                                    <span class="badge" style="background: #9ca3af; font-size: 0.85rem;">
                                        <i class="bi bi-x-circle"></i> Belum
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.transactions.edit', $transaction->id) }}" 
                                   class="btn btn-sm"
                                   style="background: #2B4D62; color: white; padding: 0.25rem 0.75rem;">
                                    <i class="bi bi-{{ $transaction->drive_link ? 'pencil-square' : 'cloud-upload' }}"></i>
                                    {{ $transaction->drive_link ? 'Edit' : 'Upload' }}
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div style="color: #9ca3af;">
                                    <i class="bi bi-inbox" style="font-size: 3rem;"></i>
                                    <p class="mt-2">Belum ada data transaksi</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($transactions->hasPages())
        <div class="card-footer bg-light">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    Menampilkan {{ $transactions->firstItem() }}-{{ $transactions->lastItem() }} dari {{ $transactions->total() }}
                </small>
                {{ $transactions->links() }}
            </div>
        </div>
        @endif
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Transaction index page loaded');
});
</script>
@endpush