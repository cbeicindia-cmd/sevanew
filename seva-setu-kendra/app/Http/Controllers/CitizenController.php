<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Scheme;
use App\Services\SchemeRecommendationService;
use Illuminate\Http\Request;

class CitizenController extends Controller
{
    public function dashboard()
    {
        return view('citizen.dashboard', [
            'applications' => Application::where('citizen_id', auth()->id())->latest()->paginate(15),
        ]);
    }

    public function search(Request $request)
    {
        $schemes = Scheme::query()
            ->when($request->state, fn ($q) => $q->where('state', $request->state))
            ->when($request->category, fn ($q) => $q->where('category', $request->category))
            ->paginate(20);

        return view('citizen.search', compact('schemes'));
    }

    public function recommendations(Request $request, SchemeRecommendationService $service)
    {
        $results = $service->recommend($request->all());
        return response()->json($results);
    }
}
