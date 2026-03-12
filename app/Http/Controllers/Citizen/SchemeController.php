<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Scheme;
use App\Services\AISchemeRecommendationService;
use Illuminate\Http\Request;

class SchemeController extends Controller
{
    public function index(Request $request)
    {
        $schemes = Scheme::query()
            ->when($request->state, fn ($q, $v) => $q->where('state', $v))
            ->when($request->category, fn ($q, $v) => $q->where('category', $v))
            ->paginate(20);

        return view('citizen.schemes', compact('schemes'));
    }

    public function recommendations(Request $request, AISchemeRecommendationService $service)
    {
        $data = $request->validate([
            'state' => 'required|string',
            'income' => 'required|string',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        $recommendations = $service->recommend($data);

        return view('citizen.recommendations', compact('recommendations', 'data'));
    }

    public function track()
    {
        $applications = Application::with('scheme')
            ->where('citizen_id', auth()->id())
            ->latest()->get();

        return view('citizen.track', compact('applications'));
    }
}
