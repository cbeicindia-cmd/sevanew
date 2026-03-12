@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Search Government Schemes</h2>
<div class="space-y-3">
@foreach($schemes as $scheme)
    <div class="bg-white p-4 rounded shadow">
        <h3 class="font-semibold">{{ $scheme->scheme_name }}</h3>
        <p class="text-sm">{{ $scheme->state }} | {{ $scheme->category }} | {{ $scheme->department }}</p>
        <p class="text-sm mt-2">{{ $scheme->description }}</p>
    </div>
@endforeach
</div>
@endsection
