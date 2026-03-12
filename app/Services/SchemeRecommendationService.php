<?php

namespace App\Services;

use App\Models\Scheme;

class SchemeRecommendationService
{
    public function recommend(array $profile)
    {
        return Scheme::query()
            ->when($profile['state'] ?? null, fn ($q, $state) => $q->whereIn('state', [$state, 'All']))
            ->when($profile['category'] ?? null, fn ($q, $category) => $q->where('category', $category))
            ->when($profile['income'] ?? null, fn ($q, $income) => $q->where('eligibility', 'like', "%{$income}%"))
            ->latest('last_updated')
            ->limit(10)
            ->get();
    }
}
