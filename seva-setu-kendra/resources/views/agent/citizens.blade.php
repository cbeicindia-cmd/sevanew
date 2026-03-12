@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Citizens</h1>
@foreach($citizens as $citizen)
<div class="bg-white p-3 rounded shadow mb-2">{{ $citizen->name }} - {{ $citizen->state }}</div>
@endforeach
@endsection
