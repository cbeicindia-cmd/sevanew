@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Agent Portal</h2>
<div class="bg-white p-4 rounded shadow">
    <p class="font-semibold mb-2">Recent Applications</p>
    <ul class="space-y-2">
        @foreach($applications as $application)
            <li class="border rounded p-2">Application #{{ $application->id }} - {{ ucfirst($application->status) }}</li>
        @endforeach
    </ul>
</div>
@endsection
