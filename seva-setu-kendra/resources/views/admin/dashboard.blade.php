@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
<div class="grid md:grid-cols-5 gap-4">
    <div class="bg-white p-4 rounded shadow">Total Agents: {{ $totalAgents }}</div>
    <div class="bg-white p-4 rounded shadow">Total Citizens: {{ $totalCitizens }}</div>
    <div class="bg-white p-4 rounded shadow">Total Schemes: {{ $totalSchemes }}</div>
    <div class="bg-white p-4 rounded shadow">Total Applications: {{ $totalApplications }}</div>
    <div class="bg-white p-4 rounded shadow">Monthly Revenue: ₹{{ number_format($monthlyRevenue, 2) }}</div>
</div>
<canvas id="dashboardChart" class="mt-8 bg-white rounded shadow p-4"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('dashboardChart'), {
    type: 'bar',
    data: {
        labels: ['Agents', 'Citizens', 'Schemes', 'Applications'],
        datasets: [{
            label: 'SEVA SETU KENDRA Metrics',
            data: [{{ $totalAgents }}, {{ $totalCitizens }}, {{ $totalSchemes }}, {{ $totalApplications }}],
            backgroundColor: ['#1d4ed8','#0ea5e9','#9333ea','#16a34a']
        }]
    }
});
</script>
@endsection
