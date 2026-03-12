<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentProfile extends Model
{
    protected $fillable = [
        'user_id', 'aadhaar_number', 'pan_number', 'address', 'education',
        'documents_path', 'status', 'otp_verified_at', 'email_verified_at', 'approved_by',
    ];
}
