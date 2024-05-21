<?php

namespace Laraverse\Atlas\Traits;

use Illuminate\Support\Collection;
use Laraverse\Atlas\Exceptions\InvalidColumn;
use Laraverse\Atlas\Helpers;
use Laraverse\Atlas\Models\PaymentProduct;

trait PaymentProducts {

    /**
     * get payment products.
     */
    public function getPaymentProducts(): Collection
    {
        $columns = PaymentProduct::generalColumns();

        return PaymentProduct::select($columns)->get();
    }

    /**
     * get payment product by specified column.
     */
    public function getPaymentProductBy(string $value, string $column = 'id'): ?PaymentProduct
    {
        $columns = PaymentProduct::generalColumns();

        $validColumns = Helpers::columns('payment_methods', ['logo', 'order']);

        if (empty($column)) { throw InvalidColumn::notSpecified($validColumns); }

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        return PaymentProduct::select($columns)->where($column, $value)->first();
    }

}
