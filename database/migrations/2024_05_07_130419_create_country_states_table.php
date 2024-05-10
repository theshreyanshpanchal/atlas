<?php

use Atlas\Models\Country;
use Atlas\Models\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('country_states', function (Blueprint $table) {
            $table->foreignIdFor(Country::class, 'country_id')->constrained('countries');
            $table->foreignIdFor(State::class, 'state_id')->constrained('states');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('country_states');
    }
};
