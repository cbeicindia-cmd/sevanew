@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Citizen Portal - Scheme Search</h2>
<form method="GET" class="bg-white p-4 rounded shadow grid md:grid-cols-3 gap-3 mb-6">
    <input name="state" value="{{ request('state') }}" placeholder="State" class="border p-2 rounded">
    <input name="category" value="{{ request('category') }}" placeholder="Category" class="border p-2 rounded">
    <button class="bg-blue-700 text-white rounded">Search Schemes</button>
</form>

<div class="bg-white p-6 rounded shadow mb-6">
    <h3 class="font-semibold mb-3">AI Recommendation</h3>
    <form method="POST" action="{{ route('citizen.recommendations') }}" class="grid md:grid-cols-5 gap-3">
        @csrf
        <input name="state" placeholder="State" class="border p-2 rounded" required>
        <input name="income" placeholder="Income" class="border p-2 rounded" required>
        <input name="age" placeholder="Age" class="border p-2 rounded">
        <input name="gender" placeholder="Gender" class="border p-2 rounded">
        <input name="category" placeholder="Category" class="border p-2 rounded">
        <button class="bg-green-700 text-white rounded md:col-span-5 py-2">Get AI Recommendations</button>
    </form>
</div>

<div class="bg-white p-6 rounded shadow">
    <table class="w-full text-sm">
        <thead><tr><th>Code</th><th>Scheme Name</th><th>State</th><th>Category</th></tr></thead>
        <tbody>
            @foreach($schemes as $scheme)
                <tr class="border-t"><td>{{ $scheme->scheme_code }}</td><td>{{ $scheme->scheme_name }}</td><td>{{ $scheme->state }}</td><td>{{ $scheme->category }}</td></tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
