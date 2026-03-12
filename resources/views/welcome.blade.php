@extends('layouts.app')

@section('content')
<div class="grid md:grid-cols-3 gap-4">
    <a href="/admin/dashboard" class="bg-white p-6 rounded-xl shadow">Admin Dashboard</a>
    <a href="/become-agent" class="bg-white p-6 rounded-xl shadow">Become Seva Setu Agent</a>
    <a href="/citizen/dashboard" class="bg-white p-6 rounded-xl shadow">Citizen Portal</a>
</div>
@endsection
