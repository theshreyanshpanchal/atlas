<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laraverse\Atlas\Enums\Tables;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Tables::COUNTRY_TIMEZONES, function (Blueprint $table) {
            
            $table->foreignId('country_id')->nullable()->constrained(Tables::COUNTRIES);
            
            $table->foreignId('timezone_id')->nullable()->constrained(Tables::TIMEZONES);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Tables::COUNTRY_TIMEZONES);
    }
};
