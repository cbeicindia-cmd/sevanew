@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Admin Dashboard</h2>
<div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
    <div class="bg-white p-4 rounded shadow">Total Agents: {{ $totalAgents }}</div>
    <div class="bg-white p-4 rounded shadow">Total Citizens: {{ $totalCitizens }}</div>
    <div class="bg-white p-4 rounded shadow">Total Schemes: {{ $totalSchemes }}</div>
    <div class="bg-white p-4 rounded shadow">Total Applications: {{ $totalApplications }}</div>
    <div class="bg-white p-4 rounded shadow">Monthly Revenue: ₹{{ $monthlyRevenue }}</div>
</div>
<div class="bg-white rounded shadow p-4">
    <canvas id="revenueChart" height="80"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('revenueChart'), {
    type: 'bar',
    data: {
        labels: ['Agents', 'Citizens', 'Schemes', 'Applications'],
        datasets: [{
            label: 'Platform Metrics',
            data: [{{ $totalAgents }}, {{ $totalCitizens }}, {{ $totalSchemes }}, {{ $totalApplications }}],
            backgroundColor: ['#1d4ed8', '#059669', '#7c3aed', '#d97706']
        }]
    }
});
</script>
@endsection
