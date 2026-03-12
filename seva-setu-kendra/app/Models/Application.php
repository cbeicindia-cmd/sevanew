<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['scheme_id','citizen_id','agent_id','status','documents'];

    protected $casts = ['documents' => 'array'];
}
