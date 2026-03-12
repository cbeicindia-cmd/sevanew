<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Commission;
use App\Models\Scheme;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalAgents' => User::where('role', 'agent')->count(),
            'totalCitizens' => User::where('role', 'citizen')->count(),
            'totalSchemes' => Scheme::count(),
            'totalApplications' => Application::count(),
            'monthlyRevenue' => Commission::whereMonth('created_at', now()->month)->sum('platform_fee'),
        ]);
    }

    public function approveAgent(User $agent)
    {
        $agent->agentProfile()->update(['status' => 'approved', 'approved_by' => auth()->id()]);
        return back()->with('success', 'Agent approved successfully.');
    }

    public function rejectAgent(User $agent)
    {
        $agent->agentProfile()->update(['status' => 'rejected', 'approved_by' => auth()->id()]);
        return back()->with('success', 'Agent rejected successfully.');
    }
}
