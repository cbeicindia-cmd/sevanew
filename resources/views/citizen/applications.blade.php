@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">My Scheme Applications</h2>
<table class="w-full bg-white shadow rounded">
<thead><tr class="bg-gray-100"><th class="p-2">ID</th><th>Status</th><th>Submitted</th></tr></thead>
<tbody>
@foreach($applications as $application)
<tr class="border-t"><td class="p-2">{{ $application->id }}</td><td>{{ ucfirst($application->status) }}</td><td>{{ $application->created_at }}</td></tr>
@endforeach
</tbody>
</table>
@endsection
