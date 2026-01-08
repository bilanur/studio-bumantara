@extends('admin.layout')

@section('content')
<h4 class="mb-4">Dashboard</h4>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Total Booking</h6>
                <h3>{{ $totalBooking }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Jadwal Hari Ini</h6>
                <h3>{{ $jadwalHariIni }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Booking Terbaru</h6>
                <h3>{{ $bookingTerbaru }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm p-3">
            <canvas id="lineChart"></canvas>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <canvas id="donutChart"></canvas>
        </div>
    </div>
</div>

<script>
    const lineCtx = document.getElementById('lineChart');
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [{
                label: 'Booking',
                data: [12, 19, 10, 15, 22, 30, 25],
                fill: true,
                tension: 0.4
            }]
        }
    });

    const donutCtx = document.getElementById('donutChart');
    new Chart(donutCtx, {
        type: 'doughnut',
        data: {
            labels: ['Selesai', 'Diproses', 'Batal'],
            datasets: [{
                data: [60, 30, 10]
            }]
        }
    });
</script>
@endsection