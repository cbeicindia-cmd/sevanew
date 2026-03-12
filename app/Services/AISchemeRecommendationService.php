<?php

namespace App\Services;

use App\Models\Scheme;
use Illuminate\Support\Facades\Http;
use OpenAI\Laravel\Facades\OpenAI;

class AISchemeRecommendationService
{
    public function recommend(array $profile): array
    {
        $provider = config('services.ai.provider', 'local');

        if ($provider === 'openai' && !empty(config('services.openai.key'))) {
            return $this->recommendViaOpenAI($profile);
        }

        if ($provider === 'python') {
            $response = Http::post(config('services.ai.microservice_url'), $profile);
            if ($response->successful()) {
                return $response->json('recommendations', []);
            }
        }

        return $this->recommendViaRules($profile);
    }

    private function recommendViaRules(array $profile): array
    {
        return Scheme::query()
            ->when($profile['state'] ?? null, fn ($q, $state) => $q->where('state', $state))
            ->when($profile['category'] ?? null, fn ($q, $category) => $q->where('category', $category))
            ->when($profile['income'] ?? null, fn ($q, $income) => $q->where('eligibility', 'like', "%$income%"))
            ->limit(10)
            ->get(['id', 'scheme_name', 'scheme_code', 'state', 'benefits'])
            ->toArray();
    }

    private function recommendViaOpenAI(array $profile): array
    {
        $prompt = 'Recommend Indian government schemes for profile: '.json_encode($profile);
        $completion = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [['role' => 'user', 'content' => $prompt]],
        ]);

        return [['source' => 'openai', 'response' => $completion->choices[0]->message->content]];
    }
}
