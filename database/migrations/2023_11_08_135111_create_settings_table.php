<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_title');
            $table->string('app_slug');
            $table->string('app_description');
            $table->string('app_key_words');
            $table->string('app_google_id')->nullable();
            $table->string('app_manager')->nullable();
            $table->string('app_version');
            $table->timestamp('app_last_update');
            $table->string('app_favicon')->nullable();
            $table->string('app_apple_touch_icon')->nullable();
            $table->string('app_uri')->nullable();
            $table->string('app_email')->nullable();
            $table->string('app_address')->nullable();
            $table->string('app_phone_number')->nullable();
            $table->string('app_phone_number_alt')->nullable();
            $table->string('app_facebook_uri')->nullable();
            $table->string('app_whatsapp_uri')->nullable();
            $table->string('app_instagram_uri')->nullable();
            $table->integer('alerta_aniv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
