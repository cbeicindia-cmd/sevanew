<?php

return [
    'openai' => [
        'key' => env('OPENAI_API_KEY'),
    ],
    'ai' => [
        'provider' => env('AI_PROVIDER', 'local'),
        'microservice_url' => env('AI_MICROSERVICE_URL', 'http://127.0.0.1:8001/recommend'),
    ],
];
