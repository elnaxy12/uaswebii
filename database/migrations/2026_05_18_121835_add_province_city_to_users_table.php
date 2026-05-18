<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('province_id')->nullable()->after('address');
            $table->string('province_name')->nullable()->after('province_id');
            $table->string('city_id')->nullable()->after('province_name');
            $table->string('city_name')->nullable()->after('city_id');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['province_id', 'province_name', 'city_id', 'city_name']);
        });
    }
};
