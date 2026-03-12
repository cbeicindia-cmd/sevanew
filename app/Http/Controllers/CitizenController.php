<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Scheme;

class CitizenController extends Controller
{
    public function dashboard()
    {
        return view('citizen.dashboard', [
            'applications' => Application::where('citizen_id', auth()->id())->latest()->take(10)->get(),
        ]);
    }

    public function schemes()
    {
        return view('citizen.schemes', [
            'schemes' => Scheme::latest('last_updated')->paginate(20),
        ]);
    }

    public function applications()
    {
        return view('citizen.applications', [
            'applications' => Application::where('citizen_id', auth()->id())->latest()->paginate(20),
        ]);
    }
}
