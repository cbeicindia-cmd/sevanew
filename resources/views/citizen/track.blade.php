@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Track Applications</h2>
<div class="bg-white p-6 rounded shadow">
    <table class="w-full text-sm">
        <thead><tr><th>ID</th><th>Scheme</th><th>Status</th><th>Date</th></tr></thead>
        <tbody>
            @foreach($applications as $application)
                <tr class="border-t"><td>{{ $application->id }}</td><td>{{ $application->scheme->scheme_name }}</td><td>{{ $application->status }}</td><td>{{ $application->created_at }}</td></tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
