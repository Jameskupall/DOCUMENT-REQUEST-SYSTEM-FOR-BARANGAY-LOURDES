@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-5">Daily Transactions</h1>

    <div class="flex flex-col lg:flex-row items-center">
        <div class="w-full lg:w-1/2 h-80">
            <canvas id="dailyTransactionsChart"></canvas>
        </div>

        <div class="w-full lg:w-1/2 mt-5 lg:mt-0 flex flex-col gap-3">
            <div class="flex items-center gap-3">
                <span class="w-4 h-4 bg-blue-500 block"></span>
                <p class="font-bold">INDIGENCY <span class="text-gray-700" id="indigencyLabel"></span></p>
            </div>
            <div class="flex items-center gap-3">
                <span class="w-4 h-4 bg-red-500 block"></span>
                <p class="font-bold">RESIDENCY <span class="text-gray-700" id="residencyLabel"></span></p>
            </div>
            <div class="flex items-center gap-3">
                <span class="w-4 h-4 bg-green-500 block"></span>
                <p class="font-bold">BRGY CLEARANCE <span class="text-gray-700" id="clearanceLabel"></span></p>
            </div>
            <div class="flex items-center gap-3">
                <span class="w-4 h-4 bg-yellow-500 block"></span>
                <p class="font-bold">OATH UNDERTAKING <span class="text-gray-700" id="oathLabel"></span></p>
            </div>
            <div class="flex items-center gap-3">
                <span class="w-4 h-4 bg-gray-500 block"></span>
                <p class="font-bold">BRGY CERTIFICATION <span class="text-gray-700" id="certificationLabel"></span></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('dailyTransactionsChart').getContext('2d');

        const transactionData = @json($transactionData);

        console.log("Laravel Data:", transactionData);

        const indigency = parseInt(transactionData?.indigency || 0);
        const residency = parseInt(transactionData?.residency || 0);
        const clearance = parseInt(transactionData?.clearance || 0);
        const oath = parseInt(transactionData?.oath || 0);
        const certification = parseInt(transactionData?.certification || 0);

        const totalTransactions = indigency + residency + clearance + oath + certification;

        console.log("Total Transactions:", totalTransactions);

        function getPercentage(value) {
            return totalTransactions > 0 ? ((value / totalTransactions) * 100).toFixed(2) + "%" : "0%";
        }

        document.getElementById('indigencyLabel').textContent = `(${indigency} requests, ${getPercentage(indigency)})`;
        document.getElementById('residencyLabel').textContent = `(${residency} requests, ${getPercentage(residency)})`;
        document.getElementById('clearanceLabel').textContent = `(${clearance} requests, ${getPercentage(clearance)})`;
        document.getElementById('oathLabel').textContent = `(${oath} requests, ${getPercentage(oath)})`;
        document.getElementById('certificationLabel').textContent = `(${certification} requests, ${getPercentage(certification)})`;

        const data = {
            labels: ['Indigency', 'Residency', 'Brgy Clearance', 'Oath Undertaking', 'Brgy Certification'],
            datasets: [{
                data: [indigency, residency, clearance, oath, certification],
                backgroundColor: ['#3B82F6', '#EF4444', '#10B981', '#FBBF24', '#6B7280'],
                borderWidth: 1
            }]
        };

        new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>

@endsection