<?php

namespace App\Http\Controllers;

class AdminDashboardController
{
    public function index(): array
    {
        return [
            'platform' => 'SEVA SETU KENDRA',
            'widgets' => [
                'total_agents' => 0,
                'total_citizens' => 0,
                'total_schemes' => 3000,
                'total_applications' => 0,
                'monthly_revenue' => 0,
            ],
        ];
    }
}
