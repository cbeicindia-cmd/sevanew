@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Scheme Management</h2>
<div class="bg-white p-4 rounded shadow mb-6">
<form method="POST" action="{{ route('admin.schemes.store') }}" class="grid md:grid-cols-2 gap-2">
@csrf
<input name="scheme_name" placeholder="Scheme Name" class="border p-2 rounded" required>
<input name="scheme_code" placeholder="Scheme Code" class="border p-2 rounded" required>
<input name="state" placeholder="State" class="border p-2 rounded" required>
<input name="category" placeholder="Category" class="border p-2 rounded" required>
<input name="department" placeholder="Department" class="border p-2 rounded" required>
<textarea name="description" placeholder="Description" class="border p-2 rounded md:col-span-2" required></textarea>
<textarea name="benefits" placeholder="Benefits" class="border p-2 rounded md:col-span-2" required></textarea>
<textarea name="eligibility" placeholder="Eligibility" class="border p-2 rounded md:col-span-2" required></textarea>
<textarea name="documents_required" placeholder="Documents Required" class="border p-2 rounded md:col-span-2" required></textarea>
<textarea name="application_process" placeholder="Application Process" class="border p-2 rounded md:col-span-2" required></textarea>
<input name="official_link" placeholder="Official Link" class="border p-2 rounded">
<input name="last_updated" type="date" class="border p-2 rounded">
<button class="bg-blue-600 text-white rounded py-2 md:col-span-2">Add Scheme</button>
</form>
</div>
<div class="bg-white p-4 rounded shadow"><ul>@foreach($schemes as $scheme)<li class="border-b py-2">{{ $scheme->scheme_code }} - {{ $scheme->scheme_name }}</li>@endforeach</ul></div>
@endsection
