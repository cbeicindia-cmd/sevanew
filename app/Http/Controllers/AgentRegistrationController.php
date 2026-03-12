<?php

namespace App\Http\Controllers;

class AgentRegistrationController
{
    public function create(): string
    {
        return 'Become Seva Setu Agent';
    }

    public function store(array $payload): array
    {
        return [
            'message' => 'Registration submitted. OTP + email verification pending admin approval.',
            'status' => 'pending',
            'payload' => $payload,
        ];
    }
}
