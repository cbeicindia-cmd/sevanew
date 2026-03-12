<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'role',
        'state',
        'district',
        'annual_income',
        'category',
        'aadhar_number',
        'pan_number',
        'address',
        'education',
        'agent_status',
        'otp_verified_at',
        'approved_at',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'annual_income' => 'decimal:2',
        'otp_verified_at' => 'datetime',
        'approved_at' => 'datetime',
    ];

    public function isRole(string $role): bool
    {
        return $this->role === $role;
    }
}
