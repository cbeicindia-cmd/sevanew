<?php

namespace App\Http\Controllers;

use App\Services\SchemeRecommendationService;

class AIRecommendationController
{
    public function __construct(private SchemeRecommendationService $service)
    {
    }

    public function recommend(array $profile, array $schemes): array
    {
        return [
            'platform' => 'SEVA SETU KENDRA',
            'query' => $profile,
            'recommendations' => $this->service->recommend($profile, $schemes),
        ];
    }
}
