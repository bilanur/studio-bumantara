@extends('admin.layout')

@section('content')
<h4 class="mb-4">Data Booking</h4>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Booking</th>
                    <th>Nama Pelanggan</th>
                    <th>Paket</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $index => $booking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $booking['kode'] }}</td>
                    <td>{{ $booking['nama'] }}</td>
                    <td>{{ $booking['paket'] }}</td>
                    <td>{{ $booking['tanggal'] }}</td>
                    <td>{{ $booking['jam'] }}</td>
                    <td>
                        @if($booking['status'] == 'Selesai')
                        <span class="badge bg-success">Selesai</span>
                        @elseif($booking['status'] == 'Diproses')
                        <span class="badge bg-warning text-dark">Diproses</span>
                        @else
                        <span class="badge bg-danger">Batal</span>
                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">Detail</a>
                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection