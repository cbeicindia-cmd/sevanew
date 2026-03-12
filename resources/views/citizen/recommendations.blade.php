@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">AI Scheme Recommendations</h2>
<p class="mb-4">Profile: {{ json_encode($data) }}</p>
<div class="bg-white p-6 rounded shadow">
    <ul class="list-disc pl-6">
        @foreach($recommendations as $item)
            <li>{{ is_array($item) ? ($item['scheme_name'] ?? ($item['response'] ?? json_encode($item))) : $item }}</li>
        @endforeach
    </ul>
</div>
@endsection
