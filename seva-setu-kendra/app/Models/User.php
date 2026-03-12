<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'mobile', 'password', 'role', 'state', 'district', 'status',
        'aadhar_number', 'pan_number', 'address', 'education', 'annual_income', 'category'
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'citizen_id');
    }
}
