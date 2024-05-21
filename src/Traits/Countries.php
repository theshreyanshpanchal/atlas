<?php

namespace Laraverse\Atlas\Traits;

use Illuminate\Support\Collection;
use Laraverse\Atlas\Exceptions\InvalidColumn;
use Laraverse\Atlas\Helpers;
use Laraverse\Atlas\Models\Country;
use Laraverse\Atlas\Models\Currency;
use Laraverse\Atlas\Models\PaymentProduct;
use Laraverse\Atlas\Models\State;
use Laraverse\Atlas\Models\Timezone;

trait Countries {

    /**
     * get countries.
     */
    public function getCountries(): Collection
    {
        $columns = Country::generalColumns();

        return Country::select($columns)->get();
    }

    /**
     * get country by specified column.
     */
    public function getCountryBy(string $value, string $column = 'id'): ?Country
    {
        $columns = Country::generalColumns();

        $validColumns = Helpers::columns('countries', ['emoji', 'emoji_u', 'translations']);

        if (empty($column)) { throw InvalidColumn::notSpecified($validColumns); }

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        return Country::select($columns)->where($column, $value)->first();
    }

    /**
     * get country states.
     */
    public function getCountryStates(string $value, string $column = 'id'): Collection
    {
        $relationalColumns = State::relationalColumns();

        $validColumns = Helpers::columns('countries', ['emoji', 'emoji_u', 'translations']);

        if (empty($column)) { throw InvalidColumn::notSpecified($validColumns); }

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        $country = Country::select('id')->with('states:' . $relationalColumns)->where($column, $value)->first();

        if (! $country) { return new Collection(); }

        $states = $country->states;

        foreach ($states as $state) { $state->makeHidden('country_id'); }

        return $states;
    }

    /**
     * get country currencies.
     */
    public function getCountryCurrencies(string $value, string $column = 'id'): Collection
    {
        $relationalColumns = Currency::relationalColumns();

        $validColumns = Helpers::columns('countries', ['emoji', 'emoji_u', 'translations']);

        if (empty($column)) { throw InvalidColumn::notSpecified($validColumns); }

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        $country = Country::select('id')->with('currencies:' . $relationalColumns)->where($column, $value)->first();

        if (! $country) { return new Collection(); }

        return $country->currencies;
    }

    /**
     * get country timezones.
     */
    public function getCountryTimezones(string $value, string $column = 'id'): Collection
    {
        $relationalColumns = Timezone::relationalColumns();

        $validColumns = Helpers::columns('countries', ['emoji', 'emoji_u', 'translations']);

        if (empty($column)) { throw InvalidColumn::notSpecified($validColumns); }

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        $country = Country::select('id')->with('timezones:' . $relationalColumns)->where($column, $value)->first();

        if (! $country) { return new Collection(); }

        return $country->timezones;
    }

    /**
     * get country payment products.
     */
    public function getCountryPaymentProducts(string $value, string $column = 'id'): Collection
    {
        $relationalColumns = PaymentProduct::relationalColumns();

        $validColumns = Helpers::columns('countries', ['emoji', 'emoji_u', 'translations']);

        if (empty($column)) { throw InvalidColumn::notSpecified($validColumns); }

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        $country = Country::select('id')->with('paymentProducts:' . $relationalColumns)->where($column, $value)->first();

        if (! $country) { return new Collection(); }

        return $country->paymentProducts;
    }
}
