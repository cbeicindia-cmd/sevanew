<?php

namespace App\Services;

class CommissionService
{
    public function buildBreakdown(float $serviceFee = 100): array
    {
        $agentCommission = 60;
        $platformFee = $serviceFee - $agentCommission;

        return [
            'service_fee' => $serviceFee,
            'agent_commission' => $agentCommission,
            'platform_fee' => $platformFee,
        ];
    }
}
