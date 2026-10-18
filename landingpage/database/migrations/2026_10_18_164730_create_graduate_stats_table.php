<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graduate_stats', function (Blueprint $table) {
            $table->id();
            $table->string('label');       // Nama kategori, mis: "Aichi", "Magang", "Laki-laki"
            $table->string('category');    // Pengelompokan, mis: "Provinsi", "Jenis Program", "Jenis Kelamin"
            $table->integer('total');      // Jumlah lulusan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graduate_stats');
    }
};
