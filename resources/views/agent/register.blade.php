@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Become Seva Setu Agent</h2>
<form method="POST" action="{{ route('agent.register.submit') }}" class="grid md:grid-cols-2 gap-4 bg-white p-6 rounded shadow">
    @csrf
    <input name="name" placeholder="Full Name" class="border p-2 rounded" required>
    <input name="mobile" placeholder="Mobile Number" class="border p-2 rounded" required>
    <input name="email" placeholder="Email" class="border p-2 rounded" required>
    <input type="password" name="password" placeholder="Password" class="border p-2 rounded" required>
    <input name="aadhaar_number" placeholder="Aadhar Number" class="border p-2 rounded" required>
    <input name="pan_number" placeholder="PAN Number" class="border p-2 rounded" required>
    <input name="state" placeholder="State" class="border p-2 rounded" required>
    <input name="district" placeholder="District" class="border p-2 rounded" required>
    <input name="education" placeholder="Education" class="border p-2 rounded" required>
    <textarea name="address" placeholder="Address" class="border p-2 rounded md:col-span-2" required></textarea>
    <button class="bg-blue-700 text-white py-2 rounded md:col-span-2">Submit Registration</button>
</form>
@endsection
