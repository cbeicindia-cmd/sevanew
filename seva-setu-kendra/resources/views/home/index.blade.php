@extends('layouts.app')

@section('content')
<div class="grid gap-4">
    <h1 class="text-3xl font-bold">Welcome to SEVA SETU KENDRA</h1>
    <p>Digital assistance platform for government scheme discovery and applications.</p>
    <div class="grid md:grid-cols-3 gap-4">
        @foreach($featuredSchemes as $scheme)
            <div class="rounded bg-white p-4 shadow">
                <h2 class="font-semibold">{{ $scheme->scheme_name }}</h2>
                <p class="text-sm text-gray-500">{{ $scheme->state }} • {{ $scheme->category }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
