@extends('layouts.app')

@section('content')
<div class="bg-white rounded shadow p-8">
    <h2 class="text-2xl font-bold mb-2">Welcome to SEVA SETU KENDRA</h2>
    <p class="mb-4">Digital platform for agents and citizens to access government schemes.</p>
    <a href="{{ route('agent.register.form') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Become Seva Setu Agent</a>
</div>
@endsection
