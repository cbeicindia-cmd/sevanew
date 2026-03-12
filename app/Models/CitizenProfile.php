<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitizenProfile extends Model
{
    protected $fillable = [
        'user_id', 'annual_income', 'category', 'age', 'gender', 'state', 'district',
    ];
}
