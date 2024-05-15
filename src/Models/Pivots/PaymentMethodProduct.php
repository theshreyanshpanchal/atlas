<?php

namespace Atlas\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PaymentMethodProduct extends Pivot
{
    protected $table = 'payment_method_products';

    protected $guarded = [];

    public $timestamps = false;
}
