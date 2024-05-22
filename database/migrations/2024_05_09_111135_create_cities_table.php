<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laraverse\Atlas\Enums\Tables;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(Tables::CITIES, function (Blueprint $table) {

            $table->id();

            $table->foreignId('state_id')->nullable()->constrained(Tables::STATES);
            
            $table->string('name');
            
            $table->string('latitude')->nullable();
            
            $table->string('longitude')->nullable();
            
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists(Tables::CITIES);
    }
};
