<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Kolom graduates_gdrive_link sebelumnya string(255) sementara validasi
     * mengizinkan max:500. Perpanjang agar URL panjang tidak gagal insert.
     */
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('graduates_gdrive_link', 500)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('graduates_gdrive_link', 255)->nullable()->change();
        });
    }
};
