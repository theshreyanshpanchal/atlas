<?php

use App\Models\PaymentMethod;
use App\Models\PaymentProduct;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_method_products', function (Blueprint $table) {
            $table->foreignIdFor(PaymentMethod::class, 'payment_method_id')->constrained('payment_methods');
            $table->foreignIdFor(PaymentProduct::class, 'payment_product_id')->constrained('payment_products');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_method_products');
    }
};
