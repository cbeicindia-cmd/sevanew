@extends('layouts.app')
@section('content')
<h2 class="text-xl font-bold mb-4">Manage Schemes</h2>
<a href="{{ route('schemes.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">Add Scheme</a>
@endsection
