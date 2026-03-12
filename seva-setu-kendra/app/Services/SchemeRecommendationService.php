<?php

namespace App\Services;

use App\Models\Scheme;
use OpenAI\Laravel\Facades\OpenAI;

class SchemeRecommendationService
{
    public function recommend(array $profile): array
    {
        $filtered = Scheme::query()
            ->when($profile['state'] ?? null, fn ($q, $v) => $q->where('state', $v))
            ->when($profile['category'] ?? null, fn ($q, $v) => $q->where('category', $v))
            ->limit(20)
            ->get();

        if (empty(config('services.openai.key'))) {
            return $filtered->map(fn ($s) => [
                'scheme_name' => $s->scheme_name,
                'why' => 'Rule-based match on state/category/income bracket.',
            ])->toArray();
        }

        $prompt = "User profile: " . json_encode($profile) . "\nSchemes: " . $filtered->toJson();

        $response = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => 'Return top eligible schemes in JSON array format.'],
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        return json_decode($response->choices[0]->message->content, true) ?: [];
    }
}
