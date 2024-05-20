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
        Schema::create('country_currencies', function (Blueprint $table) {
            
            $table->foreignId('country_id')->nullable()->constrained('countries');
            
            $table->foreignId('currency_id')->nullable()->constrained('currencies');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_currencies');
    }
};
