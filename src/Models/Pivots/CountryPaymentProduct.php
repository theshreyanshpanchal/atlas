<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CountryPaymentProduct extends Pivot
{
    protected $table = 'country_payment_products';

    protected $guarded = [];

    public $timestamps = false;
}
