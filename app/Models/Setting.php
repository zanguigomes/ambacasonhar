<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_title',
        'app_slug',
        'app_description',
        'app_key_words',
        'app_google_id',
        'app_manager',
        'app_version',
        'app_last_update',
        'app_favicon',
        'app_apple_touch_icon',
        'app_uri',
        'app_email',
        'app_address',
        'app_phone_number',
        'app_phone_number_alt',
        'app_facebook_uri',
        'app_linkedin_uri',
        'app_instagram_uri',
        'alerta_aniv',
    ];
}
