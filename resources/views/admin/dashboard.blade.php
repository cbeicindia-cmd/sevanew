@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Admin Dashboard</h2>
<div class="grid md:grid-cols-5 gap-4 mb-6">
    @foreach (['Total Agents', 'Total Citizens', 'Total Schemes', 'Total Applications', 'Monthly Revenue'] as $widget)
    <div class="bg-white p-4 rounded-lg shadow">
        <p class="text-sm text-gray-500">{{ $widget }}</p>
        <p class="text-2xl font-bold">0</p>
    </div>
    @endforeach
</div>
<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="font-semibold mb-3">Operations</h3>
    <ul class="list-disc ml-6 space-y-1">
        <li>Approve agents</li>
        <li>Add/Edit schemes</li>
        <li>View applications</li>
        <li>Manage users</li>
        <li>View commission reports and platform revenue</li>
    </ul>
</div>
@endsection
