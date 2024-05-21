<?php

namespace Laraverse\Atlas\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Laraverse\Atlas\Exceptions\InvalidColumn;
use Laraverse\Atlas\Helpers;
use Laraverse\Atlas\Models\Country;
use Laraverse\Atlas\Models\Currency;

trait Currencies {

    /**
     * get currencies.
     */
    public function getCurrencies(): Collection
    {
        $columns = Currency::generalColumns();

        return Currency::select($columns)->get();
    }

    /**
     * get currency by specified column.
     */
    public function getCurrencyBy(string $value, string $column = 'id'): ?Currency
    {
        $columns = Currency::generalColumns();

        $validColumns = Helpers::columns('currencies', ['symbol']);

        if (empty($column)) { throw InvalidColumn::notSpecified($validColumns); }

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        return Currency::select($columns)->where($column, $value)->first();
    }

     /**
     * get countries based on supported currency.
     */
    public function getCountriesBasedOnSupportedCurrency(string $value, string $column = 'id'): Collection
    {
        $columns = Country::generalColumns();

        $validColumns = Helpers::columns('currencies', ['symbol']);

        if (empty($column)) { throw InvalidColumn::notSpecified($validColumns); }

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        return Country::select($columns)->whereHas(

            'currencies',

            function(Builder $builder) use ($value, $column) { $builder->where($column, $value); }

        )->get();
    }

}
