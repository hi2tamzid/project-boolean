<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $attributes = [
        'progress' => 0,
        'is_completed' => FALSE,
    ];
}
