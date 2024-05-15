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
        Schema::create('payment_method_products', function (Blueprint $table) {
            
            $table->foreignId('payment_method_id')->constrained('payment_methods');
            
            $table->foreignId('payment_product_id')->constrained('payment_products');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_method_products');
    }
};
