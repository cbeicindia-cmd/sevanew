<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = ['agent_id', 'application_id', 'service_fee', 'agent_commission', 'platform_fee'];

    protected $casts = [
        'service_fee' => 'decimal:2',
        'agent_commission' => 'decimal:2',
        'platform_fee' => 'decimal:2',
    ];

    public function agent() { return $this->belongsTo(User::class, 'agent_id'); }
    public function application() { return $this->belongsTo(Application::class); }
}
