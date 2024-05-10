<?php

use App\Models\Country;
use App\Models\PaymentProduct;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('country_payment_products', function (Blueprint $table) {
            $table->foreignIdFor(Country::class, 'country_id')->constrained('countries');
            $table->foreignIdFor(PaymentProduct::class, 'payment_product_id')->constrained('payment_products');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('country_payment_products');
    }
};
