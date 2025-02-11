@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl md:text-4xl font-bold text-center mb-6">Daily Transactions Analytics</h1>


    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @php
        $documents = [
        ['name' => 'Brgy Clearance', 'count' => 45],
        ['name' => 'Indigency', 'count' => 30],
        ['name' => 'Residency', 'count' => 25],
        ['name' => 'Brgy Certificate', 'count' => 40],
        ['name' => 'Oath Undertaking', 'count' => 20]
        ];
        @endphp

        @foreach ($documents as $doc)
        <div class="bg-blue-500 text-white text-center p-5 rounded-lg shadow-lg hover:shadow-xl transition">
            <h2 class="text-lg font-semibold">{{ $doc['name'] }}</h2>
            <p class="text-3xl font-bold mt-2">{{ $doc['count'] }}</p>
            <span class="text-sm opacity-90">Requests Today</span>
        </div>
        @endforeach
    </div>

    <div class="mt-10 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-center mb-4">Transaction Trends</h2>
        <div class="h-[400px]">
            <canvas id="transactionsChart"></canvas>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('transactionsChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Brgy Clearance', 'Indigency', 'Residency', 'Brgy Certificate', 'Oath Undertaking'],
                datasets: [{
                    label: 'Requests Today',
                    data: [45, 30, 25, 40, 20],
                    backgroundColor: ['#2563EB', '#3B82F6', '#1E40AF', '#60A5FA', '#93C5FD'],
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection