<?php

namespace App\Http\Controllers;

class CitizenPortalController
{
    public function dashboard(): array
    {
        return [
            'title' => 'Citizen Portal',
            'actions' => ['Search schemes', 'Check eligibility', 'Apply through agent', 'Track application'],
        ];
    }
}
