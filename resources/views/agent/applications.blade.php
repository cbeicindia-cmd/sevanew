@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Agent Portal - Applications</h2>
<div class="bg-white p-6 rounded shadow mb-6">
    <h3 class="font-semibold mb-2">Submit New Application</h3>
    <form method="POST" action="{{ route('agent.applications.store') }}" class="grid md:grid-cols-2 gap-3">
        @csrf
        <input name="scheme_id" placeholder="Scheme ID" class="border p-2 rounded" required>
        <input name="citizen_id" placeholder="Citizen ID" class="border p-2 rounded" required>
        <button class="bg-blue-700 text-white rounded py-2 md:col-span-2">Submit (₹100 fee split: ₹60/₹40)</button>
    </form>
</div>
<div class="bg-white p-6 rounded shadow">
    <table class="w-full text-sm">
        <thead><tr><th>ID</th><th>Citizen</th><th>Scheme</th><th>Status</th></tr></thead>
        <tbody>
            @foreach($applications as $application)
            <tr class="border-t"><td>{{ $application->id }}</td><td>{{ $application->citizen->name ?? 'N/A' }}</td><td>{{ $application->scheme->scheme_name ?? 'N/A' }}</td><td>{{ $application->status }}</td></tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
