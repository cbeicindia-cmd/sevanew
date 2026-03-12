@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Become Seva Setu Agent</h2>
    <form method="POST" action="{{ route('agent.register.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @csrf
        <input name="name" placeholder="Full Name" class="border p-2 rounded" required>
        <input name="mobile" placeholder="Mobile Number" class="border p-2 rounded" required>
        <input name="email" type="email" placeholder="Email" class="border p-2 rounded" required>
        <input name="password" type="password" placeholder="Password" class="border p-2 rounded" required>
        <input name="password_confirmation" type="password" placeholder="Confirm Password" class="border p-2 rounded" required>
        <input name="aadhar_number" placeholder="Aadhar Number" class="border p-2 rounded" required>
        <input name="pan_number" placeholder="PAN Number" class="border p-2 rounded" required>
        <input name="state" placeholder="State" class="border p-2 rounded" required>
        <input name="district" placeholder="District" class="border p-2 rounded" required>
        <input name="education" placeholder="Education" class="border p-2 rounded">
        <textarea name="address" placeholder="Address" class="border p-2 rounded md:col-span-2" required></textarea>
        <button class="bg-blue-700 text-white py-2 rounded md:col-span-2">Submit Registration</button>
    </form>
    <p class="text-sm text-gray-600 mt-4">Flow: Mobile OTP verification → Email confirmation → Admin approval.</p>
</div>
@endsection
