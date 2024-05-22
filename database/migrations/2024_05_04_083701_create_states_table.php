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
        Schema::create(Tables::STATES, function (Blueprint $table) {
            
            $table->id();

            $table->foreignId('country_id')->nullable()->constrained(Tables::COUNTRIES);
            
            $table->string('name');
            
            $table->string('code');
            
            $table->string('latitude')->nullable();
            
            $table->string('longitude')->nullable();
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Tables::STATES);
    }
};
