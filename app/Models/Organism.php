<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organism extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'category',
        'title',
        'slug',
        'head_line',
        'content',
        'manager',
        'avatar',
        'phone',
        'email',
        'time_table',
        'location',
        'active',
    ];
}
