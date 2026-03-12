<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Commission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function showRegistration()
    {
        return view('agent.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15|unique:users,mobile',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'aadhaar_number' => 'required|string|max:20',
            'pan_number' => 'required|string|max:20',
            'state' => 'required|string',
            'district' => 'required|string',
            'address' => 'required|string',
            'education' => 'required|string',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'agent',
            'state' => $validated['state'],
            'district' => $validated['district'],
        ]);

        $user->agentProfile()->create([
            'aadhaar_number' => $validated['aadhaar_number'],
            'pan_number' => $validated['pan_number'],
            'address' => $validated['address'],
            'education' => $validated['education'],
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Registration submitted. Verify OTP + email; wait for admin approval.');
    }

    public function dashboard()
    {
        return view('agent.dashboard', [
            'applications' => Application::where('agent_id', auth()->id())->latest()->take(10)->get(),
        ]);
    }

    public function storeApplication(Request $request)
    {
        $application = Application::create([
            'scheme_id' => $request->scheme_id,
            'citizen_id' => $request->citizen_id,
            'agent_id' => auth()->id(),
            'status' => 'submitted',
            'documents' => $request->documents ?? [],
        ]);

        Commission::create([
            'agent_id' => auth()->id(),
            'application_id' => $application->id,
            'service_fee' => 100,
            'agent_commission' => 60,
            'platform_fee' => 40,
        ]);

        return back()->with('success', 'Application submitted and commission generated.');
    }
}
