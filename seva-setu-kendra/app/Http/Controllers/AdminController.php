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

    public function agents()
    {
        return view('admin.agents', ['agents' => User::where('role', 'agent')->latest()->paginate(20)]);
    }

    public function approveAgent(User $agent)
    {
        $agent->update(['status' => 'approved']);
        return back()->with('status', 'Agent approved successfully.');
    }

    public function commissionReport()
    {
        return view('admin.commissions', ['commissions' => Commission::latest()->paginate(50)]);
    }
}
