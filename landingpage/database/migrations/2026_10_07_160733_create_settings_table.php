<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('site_name')->nullable();
            $table->string('tagline')->nullable();

            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();

            $table->longText('profile')->nullable();

            $table->longText('vision')->nullable();
            $table->longText('mission')->nullable();

            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();

            $table->integer('students_count')->default(0);
            $table->integer('graduates_count')->default(0);
            $table->integer('japan_count')->default(0);
            $table->integer('experience_years')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};