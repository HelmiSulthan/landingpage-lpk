<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel leaders tidak pernah dipakai (data atasan disimpan di tabel settings).
     */
    public function up(): void
    {
        Schema::dropIfExists('leaders');
    }

    public function down(): void
    {
        Schema::create('leaders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }
};
