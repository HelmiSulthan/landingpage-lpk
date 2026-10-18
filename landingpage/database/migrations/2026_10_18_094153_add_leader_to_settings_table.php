<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('leader_photo')->nullable()->after('mission');
            $table->string('leader_name')->nullable()->after('leader_photo');
            $table->string('leader_position')->nullable()->after('leader_name');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['leader_photo', 'leader_name', 'leader_position']);
        });
    }
};
