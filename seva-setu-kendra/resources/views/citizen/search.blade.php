@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Search Schemes</h1>
@foreach($schemes as $scheme)
<div class="bg-white p-3 rounded shadow mb-2">{{ $scheme->scheme_name }} ({{ $scheme->state }})</div>
@endforeach
@endsection
