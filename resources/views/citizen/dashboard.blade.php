@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Citizen Portal</h2>
<div class="bg-white rounded p-4 shadow">
    <p class="font-semibold">Track Your Applications</p>
    <ul class="space-y-2 mt-2">
        @foreach($applications as $application)
            <li class="border p-2 rounded">#{{ $application->id }} - {{ ucfirst($application->status) }}</li>
        @endforeach
    </ul>
</div>
@endsection
