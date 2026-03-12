<?php

namespace App\Models;

class Application
{
    public const STATUS_SUBMITTED = 'Submitted';
    public const STATUS_PROCESSING = 'Processing';
    public const STATUS_APPROVED = 'Approved';
    public const STATUS_REJECTED = 'Rejected';

    public int $id;
    public int $scheme_id;
    public int $citizen_id;
    public int $agent_id;
    public string $status = self::STATUS_SUBMITTED;
    public string $documents;
}
