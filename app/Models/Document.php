<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'head_line',
        'file',
        'type',
        'extention',
        'pages',
        'size',
        'section',
        'date_pub',
        'number',
        'series',
        'secrecy',
        'active',
    ];

    protected $casts = [
        'file' => 'array',
    ];
}
