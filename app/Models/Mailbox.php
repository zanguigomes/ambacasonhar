<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailbox extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'email',
        'phone',
        'subject',
        'message',
        'active',
        'read'
    ];
}
