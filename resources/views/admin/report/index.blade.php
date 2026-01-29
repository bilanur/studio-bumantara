@extends('admin.layout')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">📊 Laporan Booking</h4>

        <form method="GET" class="d-flex gap-2">
            <input type="month" name="bulan" value="{{ $bulan }}" class="form-control form-control-sm">
            <button class="btn btn-primary btn-sm">Filter</button>
        </form>
    </div>

    <!-- Statistik -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <small class="text-muted">Total Pendapatan</small>
                    <h4 class="mt-1 text-success">
                        Rp {{ number_format($total,0,',','.') }}
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <small class="text-muted">Total Transaksi</small>
                    <h4 class="mt-1">{{ $reports->count() }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <small class="text-muted">Periode</small>
                    <h4 class="mt-1">
                        {{ \Carbon\Carbon::parse($bulan.'-01')->translatedFormat('F Y') }}
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th width="60">No</th>
                            <th>Kode</th>
                            <th>Customer</th>
                            <th>Paket</th>
                            <th>Tanggal</th>
                            <th class="text-end">Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($reports as $i=>$r)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $r->kode_booking }}
                                </span>
                            </td>
                            <td>{{ $r->nama_pelanggan }}</td>
                            <td>{{ $r->package->name ?? '-' }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($r->tanggal)->format('d M Y') }}
                            </td>
                            <td class="text-end text-success fw-semibold">
                                Rp {{ number_format($r->total_pembayaran,0,',','.') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                Tidak ada data laporan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@endsection