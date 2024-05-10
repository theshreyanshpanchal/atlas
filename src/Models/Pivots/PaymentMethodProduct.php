<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

class PaymentMethodProduct extends Model
{
    protected $table = 'payment_method_products';

    protected $guarded = [];

    public $timestamps = false;
}
