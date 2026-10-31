<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah index untuk mempercepat query `latest()` (order by created_at)
     * dan groupBy category pada graduate_stats.
     */
    public function up(): void
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->index('created_at');
        });
        Schema::table('programs', function (Blueprint $table) {
            $table->index('created_at');
        });
        Schema::table('graduates', function (Blueprint $table) {
            $table->index('created_at');
        });
        Schema::table('galleries', function (Blueprint $table) {
            $table->index('created_at');
        });
        Schema::table('faqs', function (Blueprint $table) {
            $table->index('created_at');
        });
        Schema::table('hero_images', function (Blueprint $table) {
            $table->index('created_at');
        });
        Schema::table('graduate_stats', function (Blueprint $table) {
            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });
        Schema::table('programs', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });
        Schema::table('graduates', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });
        Schema::table('faqs', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });
        Schema::table('hero_images', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });
        Schema::table('graduate_stats', function (Blueprint $table) {
            $table->dropIndex(['category']);
        });
    }
};
