@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Become Seva Setu Agent</h2>
<form class="grid md:grid-cols-2 gap-4 bg-white p-6 rounded-xl shadow">
    <input class="border p-2 rounded" placeholder="Full Name" />
    <input class="border p-2 rounded" placeholder="Mobile Number" />
    <input class="border p-2 rounded" placeholder="Email" />
    <input class="border p-2 rounded" type="password" placeholder="Password" />
    <input class="border p-2 rounded" placeholder="Aadhar Number" />
    <input class="border p-2 rounded" placeholder="PAN Number" />
    <input class="border p-2 rounded" placeholder="State" />
    <input class="border p-2 rounded" placeholder="District" />
    <input class="border p-2 rounded md:col-span-2" placeholder="Address" />
    <input class="border p-2 rounded" placeholder="Education" />
    <input class="border p-2 rounded" type="file" />
    <button class="bg-indigo-600 text-white rounded px-4 py-2 md:col-span-2">Submit Registration</button>
</form>
<p class="mt-4 text-sm text-gray-600">Flow: Mobile OTP verification → Email confirmation → Admin approval.</p>
@endsection
