@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Become Seva Setu Agent</h1>
<form class="grid md:grid-cols-2 gap-4 bg-white p-6 rounded shadow">
    <input class="border p-2" placeholder="Full Name" />
    <input class="border p-2" placeholder="Mobile Number" />
    <input class="border p-2" placeholder="Email" />
    <input class="border p-2" placeholder="Password" type="password" />
    <input class="border p-2" placeholder="Aadhar Number" />
    <input class="border p-2" placeholder="PAN Number" />
    <input class="border p-2" placeholder="State" />
    <input class="border p-2" placeholder="District" />
    <input class="border p-2 md:col-span-2" placeholder="Address" />
    <input class="border p-2" placeholder="Education" />
    <input class="border p-2" type="file" />
    <p class="md:col-span-2 text-sm text-gray-600">Flow: OTP verification → Email confirmation → Admin approval.</p>
    <button class="bg-blue-700 text-white p-2 rounded md:col-span-2">Submit Registration</button>
</form>
@endsection
