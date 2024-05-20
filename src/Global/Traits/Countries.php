<?php

namespace Laraverse\Atlas\Global\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Laraverse\Atlas\Models\Country;
use Laraverse\Atlas\Models\Currency;
use Laraverse\Atlas\Models\PaymentProduct;
use Laraverse\Atlas\Models\State;
use Laraverse\Atlas\Models\Timezone;

class Countries {

    public function getCountries(): Collection
    {
        $columns = Country::generalColumns();

        return Country::select($columns)->get();
    }

    public function getCountryStates(string $iso2): Collection
    {
        $relationalColumns = State::relationalColumns();

        $country = Country::with('states:' . $relationalColumns)->where('iso2', Str::upper($iso2))->first();

        if (! $country) { return new Collection(); }

        return $country->states;
    }

    public function getCountryCurrencies(string $iso2): Collection
    {
        $relationalColumns = Currency::relationalColumns();

        $country = Country::with('currencies:' . $relationalColumns)->where('iso2', Str::upper($iso2))->first();

        if (! $country) { return new Collection(); }

        return $country->currencies;
    }

    public function getCountryTimezones(string $iso2): Collection
    {
        $relationalColumns = Timezone::relationalColumns();

        $country = Country::with('timezones:' . $relationalColumns)->where('iso2', Str::upper($iso2))->first();

        if (! $country) { return new Collection(); }

        return $country->timezones;
    }

    public function getCountryPaymentProducts(string $iso2): Collection
    {
        $relationalColumns = PaymentProduct::relationalColumns();

        $country = Country::with('paymentProducts:' . $relationalColumns)->where('iso2', Str::upper($iso2))->first();

        if (! $country) { return new Collection(); }

        return $country->paymentProducts;
    }

}