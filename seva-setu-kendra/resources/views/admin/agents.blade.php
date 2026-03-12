@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Agent Approvals</h1>
@foreach($agents as $agent)
<div class="bg-white p-3 rounded shadow mb-2 flex justify-between">
    <div>{{ $agent->name }} - {{ $agent->status }}</div>
    <form method="POST" action="{{ route('admin.agents.approve', $agent) }}">@csrf<button class="bg-green-600 text-white px-3 py-1 rounded">Approve</button></form>
</div>
@endforeach
@endsection
