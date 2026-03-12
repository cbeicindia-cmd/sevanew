<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Commission;
use App\Models\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function dashboard()
    {
        return view('agent.dashboard', [
            'applications' => Application::where('agent_id', auth()->id())->latest()->paginate(20),
        ]);
    }

    public function citizens()
    {
        return view('agent.citizens', ['citizens' => User::where('role', 'citizen')->paginate(30)]);
    }

    public function submitApplication(Request $request)
    {
        $application = Application::create([
            'scheme_id' => $request->scheme_id,
            'citizen_id' => $request->citizen_id,
            'agent_id' => auth()->id(),
            'status' => 'Submitted',
            'documents' => $request->documents ?? [],
        ]);

        Commission::create([
            'agent_id' => auth()->id(),
            'application_id' => $application->id,
            'service_fee' => 100,
            'agent_commission' => 60,
            'platform_fee' => 40,
        ]);

        return back()->with('status', 'Application submitted and commission logged.');
    }
}
