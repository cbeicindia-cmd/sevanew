<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Commission;
use App\Models\Scheme;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with(['scheme', 'citizen'])
            ->where('agent_id', auth()->id())
            ->latest()->paginate(20);

        return view('agent.applications', compact('applications'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'scheme_id' => 'required|exists:schemes,id',
            'citizen_id' => 'required|exists:users,id',
            'documents' => 'nullable|array',
        ]);

        $application = Application::create([
            ...$data,
            'agent_id' => auth()->id(),
            'status' => 'Submitted',
        ]);

        Commission::create([
            'agent_id' => auth()->id(),
            'application_id' => $application->id,
            'service_fee' => 100,
            'agent_commission' => 60,
            'platform_fee' => 40,
        ]);

        return back()->with('status', 'Application submitted and commission posted.');
    }
}
