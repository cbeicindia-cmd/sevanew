<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentRegistrationController extends Controller
{
    public function create()
    {
        return view('auth.become-agent');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15|unique:users,mobile',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'aadhar_number' => 'required|string|max:20',
            'pan_number' => 'required|string|max:20',
            'state' => 'required|string',
            'district' => 'required|string',
            'address' => 'required|string',
            'education' => 'nullable|string|max:255',
            'documents' => 'nullable|array',
        ]);

        User::create([
            ...$data,
            'password' => Hash::make($data['password']),
            'role' => 'agent',
            'agent_status' => 'pending',
            'otp_verified_at' => now(),
            'email_verified_at' => now(),
        ]);

        return redirect()->route('login')->with('status', 'Registration submitted. Await admin approval.');
    }
}
