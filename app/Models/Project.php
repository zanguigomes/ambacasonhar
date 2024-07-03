<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [

    'thumb',
    'title',
    'slug',
    'head_line',
    'content',
    'area',
    'coordination',
    'date_start',
    'date_end',
    'status',
    'active',
    ];
}
