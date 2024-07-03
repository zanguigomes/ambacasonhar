<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilamentException extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'code',
        'message',
        'file',
        'line',
        'trace',
        'method',
        'path',
        'query',
        'body',
        'cookies',
        'headers',
        'ip',
    ];
}
