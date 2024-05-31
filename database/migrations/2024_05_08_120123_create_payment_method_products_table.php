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
        Schema::create(Tables::PAYMENT_METHOD_PRODUCTS, function (Blueprint $table) {
                
            $table->foreignId('payment_method_id')->nullable()->constrained(Tables::PAYMENT_METHODS);
            
            $table->foreignId('payment_product_id')->nullable()->constrained(Tables::PAYMENT_PRODUCTS);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Tables::PAYMENT_METHOD_PRODUCTS);
    }
};
