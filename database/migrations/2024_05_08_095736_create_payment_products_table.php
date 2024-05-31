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
        $facilities = config('atlas.facilities.enabled') ?? [];

        if (in_array(Tables::PAYMENT_PRODUCTS, $facilities)) {

            Schema::create(Tables::PAYMENT_PRODUCTS, function (Blueprint $table) {
                
                $table->id();
                
                $table->string('name');
                
                $table->string('code');
                
                $table->string('logo');
                
                $table->integer('order');
                
                $table->timestamps();
    
            });

        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Tables::PAYMENT_PRODUCTS);
    }
};
