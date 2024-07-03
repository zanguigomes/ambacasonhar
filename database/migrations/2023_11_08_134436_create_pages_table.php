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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('thumb')->nullable();
            $table->string('key');
            $table->string('title');
            $table->string('slug');
            $table->string('sub_title');
            $table->mediumText('head_line')->nullable();
            $table->longText('content');
            $table->boolean('active');
            $table->dateTime('published_at')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
