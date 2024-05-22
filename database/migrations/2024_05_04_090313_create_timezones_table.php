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
        Schema::create(Tables::TIMEZONES, function (Blueprint $table) {
            
            $table->id();
            
            $table->string('zone_name');
            
            $table->string('gmt_offset')->nullable();
            
            $table->string('gmt_offset_name')->nullable();
            
            $table->string('abbreviation')->nullable();
            
            $table->string('tz_name')->nullable();
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Tables::TIMEZONES);
    }
};
