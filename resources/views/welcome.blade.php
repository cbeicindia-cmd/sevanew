@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-3xl font-bold text-blue-900 mb-4">Welcome to SEVA SETU KENDRA</h2>
    <p class="mb-6">A production-ready digital service platform where agents connect citizens with government schemes.</p>
    <div class="grid md:grid-cols-3 gap-4">
        <a href="{{ route('agent.register') }}" class="bg-blue-600 text-white px-4 py-3 rounded text-center">Become Seva Setu Agent</a>
        <a href="/citizen/schemes" class="bg-green-600 text-white px-4 py-3 rounded text-center">Citizen Portal</a>
        <a href="/admin/dashboard" class="bg-gray-800 text-white px-4 py-3 rounded text-center">Admin Dashboard</a>
    </div>
</div>
@endsection
