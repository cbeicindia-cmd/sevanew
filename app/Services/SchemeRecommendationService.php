<?php

namespace App\Services;

class SchemeRecommendationService
{
    /**
     * Lightweight recommendation scorer.
     * In production replace in-memory $schemes with DB query + vector/LLM ranking.
     */
    public function recommend(array $profile, array $schemes): array
    {
        $scored = [];

        foreach ($schemes as $scheme) {
            $score = 0;

            if (strcasecmp($scheme['state'], $profile['state'] ?? '') === 0 || $scheme['state'] === 'All') {
                $score += 30;
            }

            if (($profile['income'] ?? PHP_INT_MAX) <= ($scheme['max_income'] ?? PHP_INT_MAX)) {
                $score += 25;
            }

            if (($profile['age'] ?? 0) >= ($scheme['min_age'] ?? 0)) {
                $score += 15;
            }

            if (($scheme['gender'] ?? 'Any') === 'Any' || strcasecmp($scheme['gender'], $profile['gender'] ?? 'Any') === 0) {
                $score += 15;
            }

            if (($scheme['category'] ?? 'General') === ($profile['category'] ?? 'General')) {
                $score += 15;
            }

            if ($score > 50) {
                $scheme['score'] = $score;
                $scored[] = $scheme;
            }
        }

        usort($scored, fn ($a, $b) => $b['score'] <=> $a['score']);

        return array_slice($scored, 0, 10);
    }
}
