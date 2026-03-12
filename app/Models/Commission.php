<?php

namespace App\Models;

class Commission
{
    public int $id;
    public int $agent_id;
    public int $application_id;
    public float $service_fee;
    public float $agent_commission;
    public float $platform_fee;
}
