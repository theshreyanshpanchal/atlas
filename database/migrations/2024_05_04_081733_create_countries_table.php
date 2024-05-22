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
        Schema::create(Tables::COUNTRIES, function (Blueprint $table) {
            
            $table->id();
            
            $table->string('name');
            
            $table->string('iso3');
            
            $table->string('iso2')->nullable();
            
            $table->string('phone_code');
            
            $table->string('native')->nullable();
            
            $table->string('capital')->nullable();
            
            $table->string('latitude')->nullable();
            
            $table->string('longitude')->nullable();
            
            $table->string('emoji')->nullable();
            
            $table->string('emoji_u')->nullable();
            
            $table->string('tld')->nullable();
            
            $table->json('translations')->nullable();
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Tables::COUNTRIES);
    }
};
