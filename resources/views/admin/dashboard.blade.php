@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>
<div class="grid md:grid-cols-5 gap-4 mb-8">
    <div class="bg-white p-4 rounded shadow"><p>Total Agents</p><p class="text-2xl font-bold">{{ $totalAgents }}</p></div>
    <div class="bg-white p-4 rounded shadow"><p>Total Citizens</p><p class="text-2xl font-bold">{{ $totalCitizens }}</p></div>
    <div class="bg-white p-4 rounded shadow"><p>Total Schemes</p><p class="text-2xl font-bold">{{ $totalSchemes }}</p></div>
    <div class="bg-white p-4 rounded shadow"><p>Total Applications</p><p class="text-2xl font-bold">{{ $totalApplications }}</p></div>
    <div class="bg-white p-4 rounded shadow"><p>Monthly Revenue</p><p class="text-2xl font-bold">₹{{ $monthlyRevenue }}</p></div>
</div>

<div class="bg-white p-6 rounded shadow">
    <h3 class="text-xl font-semibold mb-4">Pending Agent Approvals</h3>
    <table class="w-full text-left text-sm">
        <thead><tr><th>Name</th><th>Email</th><th>State</th><th>Action</th></tr></thead>
        <tbody>
            @foreach($pendingAgents as $agent)
                <tr class="border-t">
                    <td>{{ $agent->name }}</td>
                    <td>{{ $agent->email }}</td>
                    <td>{{ $agent->state }}</td>
                    <td class="space-x-2 py-2">
                        <form action="{{ route('admin.agents.status', [$agent->id, 'approved']) }}" method="POST" class="inline">@csrf @method('PATCH')<button class="bg-green-600 text-white px-2 py-1 rounded">Approve</button></form>
                        <form action="{{ route('admin.agents.status', [$agent->id, 'rejected']) }}" method="POST" class="inline">@csrf @method('PATCH')<button class="bg-red-600 text-white px-2 py-1 rounded">Reject</button></form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
