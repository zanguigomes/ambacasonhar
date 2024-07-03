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
        Schema::create('organisms', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('category');
            $table->string('title');
            $table->string('slug');
            $table->mediumText('head_line');
            $table->text('content');
            $table->string('manager')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('time_table')->nullable();
            $table->string('location')->nullable();
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisms');
    }
};
