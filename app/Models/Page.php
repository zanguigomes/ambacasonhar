<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [

        'thumb',
        'key',
        'title',
        'slug',
        'sub_title',
        'head_line',
        'content',
        'active',
        'published_at',
        'user_id',
    ];
}
