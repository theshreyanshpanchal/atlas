<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timezones', function (Blueprint $table) {
            $table->id();
            $table->string('zone_name');
            $table->string('gmt_offset')->nullable();
            $table->string('gmt_offset_name')->nullable();
            $table->string('abbreviation')->nullable();
            $table->string('tz_name')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timezones');
    }
};
