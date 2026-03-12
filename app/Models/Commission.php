<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = [
        'agent_id', 'application_id', 'service_fee', 'agent_commission', 'platform_fee',
    ];
}
