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
                <h6>Booking Bulan Ini</h6>
                <h3>{{ $bookingBulanIni }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Booking Hari Ini</h6>
                <h3>{{ $bookingHariIni }}</h3>
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
    const lineData = @json($chartLine);

    new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: lineData.map(x => x.tgl),
            datasets: [{
                label: 'Booking Selesai',
                data: lineData.map(x => x.total),
                fill: true,
                tension: 0.4
            }]
        }
    });
</script>

<script>
    const donut = @json($donut);

    new Chart(document.getElementById('donutChart'), {
        type: 'doughnut',
        data: {
            labels: donut.map(x => x.status),
            datasets: [{
                data: donut.map(x => x.total)
            }]
        }
    });
</script>


@endsection