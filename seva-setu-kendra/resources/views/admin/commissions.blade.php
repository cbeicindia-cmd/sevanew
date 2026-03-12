@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Commission Report</h1>
<table class="w-full bg-white rounded shadow"><tr><th>Agent</th><th>Service Fee</th><th>Agent Commission</th><th>Platform Fee</th></tr>
@foreach($commissions as $row)
<tr><td>{{ $row->agent_id }}</td><td>{{ $row->service_fee }}</td><td>{{ $row->agent_commission }}</td><td>{{ $row->platform_fee }}</td></tr>
@endforeach
</table>
@endsection
