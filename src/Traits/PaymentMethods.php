<?php

namespace Laraverse\Atlas\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Laraverse\Atlas\Exceptions\InvalidColumn;
use Laraverse\Atlas\Helpers;
use Laraverse\Atlas\Models\PaymentMethod;
use Laraverse\Atlas\Models\PaymentProduct;

trait PaymentMethods {

    /**
     * get payment methods.
     */
    public function getPaymentMethods(): Collection
    {
        $columns = PaymentMethod::generalColumns();

        return PaymentMethod::select($columns)->get();
    }

    /**
     * get payment method by specified column.
     */
    public function getPaymentMethodBy(string $value, string $column = 'code'): ?PaymentMethod
    {
        $columns = PaymentMethod::generalColumns();

        $validColumns = Helpers::columns('payment_methods', ['order']);

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        return PaymentMethod::select($columns)->where($column, $value)->first();
    }

    /**
     * get payment method products.
     */
    public function getPaymentMethodProducts(string $value, string $column = 'code'): Collection
    {
        $relationalColumns = PaymentProduct::relationalColumns();

        $validColumns = Helpers::columns('payment_methods', ['order']);

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        $paymentMethod = PaymentMethod::select('id')->with('paymentProducts:' . $relationalColumns)->where($column, $value)->first();

        if (! $paymentMethod) { return new Collection(); }

        return $paymentMethod->paymentProducts;
    }

}
