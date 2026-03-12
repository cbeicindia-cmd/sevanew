<?php

use App\Services\AISchemeRecommendationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/ai/recommendations', function (Request $request, AISchemeRecommendationService $service) {
    return response()->json([
        'platform' => 'SEVA SETU KENDRA',
        'tagline' => 'Connecting Citizens with Government Opportunities',
        'recommendations' => $service->recommend($request->all()),
    ]);
});
