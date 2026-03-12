@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Manage Schemes</h1>
<div class="grid gap-2">
@foreach($schemes as $scheme)
<div class="bg-white p-3 rounded shadow">{{ $scheme->scheme_code }} - {{ $scheme->scheme_name }}</div>
@endforeach
</div>
@endsection
