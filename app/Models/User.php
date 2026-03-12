<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'mobile', 'password', 'role', 'state', 'district',
    ];

    protected $hidden = ['password', 'remember_token'];

    public function isRole(string ...$roles): bool
    {
        return in_array($this->role, $roles, true);
    }

    public function agentProfile(): HasOne
    {
        return $this->hasOne(AgentProfile::class);
    }

    public function citizenProfile(): HasOne
    {
        return $this->hasOne(CitizenProfile::class);
    }

    public function agentApplications(): HasMany
    {
        return $this->hasMany(Application::class, 'agent_id');
    }

    public function citizenApplications(): HasMany
    {
        return $this->hasMany(Application::class, 'citizen_id');
    }
}
