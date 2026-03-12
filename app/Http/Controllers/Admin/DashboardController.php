<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Commission;
use App\Models\Scheme;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalAgents' => User::where('role', 'agent')->count(),
            'totalCitizens' => User::where('role', 'citizen')->count(),
            'totalSchemes' => Scheme::count(),
            'totalApplications' => Application::count(),
            'monthlyRevenue' => Commission::whereMonth('created_at', now()->month)->sum('platform_fee'),
            'pendingAgents' => User::where('role', 'agent')->where('agent_status', 'pending')->latest()->take(10)->get(),
        ]);
    }
}
