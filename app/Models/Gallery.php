<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'title',
        'slug',
        'category',
        'head_line',
        'images',
        'active'
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
