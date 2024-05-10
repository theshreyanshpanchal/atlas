<?php

use Atlas\Models\Country;
use Atlas\Models\Currency;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('country_currencies', function (Blueprint $table) {
            $table->foreignIdFor(Country::class, 'country_id')->constrained('countries');
            $table->foreignIdFor(Currency::class, 'currency_id')->constrained('currencies');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('country_currencies');
    }
};
