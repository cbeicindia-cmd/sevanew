<?php

use App\Http\Controllers\AIRecommendationController;

return [
    '/recommendations' => [AIRecommendationController::class, 'recommend'],
];
