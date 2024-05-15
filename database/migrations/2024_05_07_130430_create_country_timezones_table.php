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
        Schema::create('country_timezones', function (Blueprint $table) {
            
            $table->foreignId('country_id')->constrained('countries');
            
            $table->foreignId('timezone_id')->constrained('timezones');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_timezones');
    }
};
