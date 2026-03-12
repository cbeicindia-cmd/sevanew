<?php

namespace App\Models;

class AgentProfile
{
    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    public int $user_id;
    public string $full_name;
    public string $mobile_number;
    public string $aadhar_number;
    public string $pan_number;
    public string $state;
    public string $district;
    public string $address;
    public string $education;
    public string $documents_path;
    public string $status = self::STATUS_PENDING;
}
