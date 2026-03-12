<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AgentRegistrationController;
use App\Http\Controllers\CitizenPortalController;

return [
    '/' => fn () => view('welcome'),
    '/become-agent' => [AgentRegistrationController::class, 'create'],
    '/citizen/dashboard' => [CitizenPortalController::class, 'dashboard'],
    '/admin/dashboard' => [AdminDashboardController::class, 'index'],
];
