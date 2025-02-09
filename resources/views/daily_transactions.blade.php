@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Daily Transactions Analytics</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
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
        <div class="bg-blue-500 text-white text-center p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">{{ $doc['name'] }}</h2>
            <p class="text-2xl font-bold mt-2">{{ $doc['count'] }}</p>
            <span class="text-sm">Requests Today</span>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">Transaction Trends</h2>
        <canvas id="transactionsChart"></canvas>
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
                    backgroundColor: ['#3B82F6', '#1E40AF', '#93C5FD', '#60A5FA', '#2563EB'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
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