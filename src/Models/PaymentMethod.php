<?php

namespace Laraverse\Atlas\Models;

use Laraverse\Atlas\Models\Pivots\PaymentMethodProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    protected $guarded = [];

    public function paymentProducts(): BelongsToMany
    {
        return $this->belongsToMany(PaymentProduct::class, 'payment_method_products')->using(PaymentMethodProduct::class);
    }
}
