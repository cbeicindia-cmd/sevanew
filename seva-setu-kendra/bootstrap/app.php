<?php

use App\Http\Middleware\RoleMiddleware;

return [
    'name' => 'SEVA SETU KENDRA',
    'tagline' => 'Connecting Citizens with Government Opportunities',
    'middleware' => [
        'role' => RoleMiddleware::class,
    ],
];
