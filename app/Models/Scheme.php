<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'scheme_name',
        'scheme_code',
        'state',
        'category',
        'department',
        'description',
        'benefits',
        'eligibility',
        'documents_required',
        'application_process',
        'official_link',
        'last_updated',
    ];

    protected $casts = [
        'last_updated' => 'date',
    ];
}
