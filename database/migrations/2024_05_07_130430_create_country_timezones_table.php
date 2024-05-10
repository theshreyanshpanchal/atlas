<?php

use Atlas\Models\Country;
use Atlas\Models\Timezone;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('country_timezones', function (Blueprint $table) {
            $table->foreignIdFor(Country::class, 'country_id')->constrained('countries');
            $table->foreignIdFor(Timezone::class, 'timezone_id')->constrained('timezones');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('country_timezones');
    }
};
