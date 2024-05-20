<?php

namespace Laraverse\Atlas\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Laraverse\Atlas\Exceptions\InvalidColumn;
use Laraverse\Atlas\Helpers;
use Laraverse\Atlas\Models\City;
use Laraverse\Atlas\Models\Country;
use Laraverse\Atlas\Models\Currency;
use Laraverse\Atlas\Models\State;

trait States {

    /**
     * get states.
     */
    public function getStates(): Collection
    {
        $columns = State::generalColumns();

        return State::select($columns)->get();
    }

    /**
     * get state by specified column.
     */
    public function getStateBy(string $value, string $column = 'code'): ?State
    {
        $columns = State::generalColumns();

        $validColumns = Helpers::columns('states');

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        return State::select($columns)->where($column, $value)->first();
    }

    /**
     * get state cities by specified column.
     */
    public function getStateCities(string $value, string $column = 'code'): ?Collection
    {
        $relationalColumns = City::relationalColumns();

        $validColumns = Helpers::columns('states');

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        $state = State::select('id', 'state_id')->with('cities:' . $relationalColumns)->where($column, $value)->first();

        return $state->cities;
    }

     /**
     * get state currencies.
     */
    public function getStateCurrencies(string $value, string $column = 'code'): ?Collection
    {
        $relationalColumns = Currency::relationalColumns();

        $validColumns = Helpers::columns('states');

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        $country = Country::select('id')->with('currencies:' . $relationalColumns)->whereHas(

            'states',

            function(Builder $builder) use ($value, $column) { $builder->where($column, $value); }

        )->first();

        return $country->currencies;
    }

     /**
     * get country based on given state.
     */
    public function getCountryBasedOnGivenState(string $value, string $column = 'code'): Collection
    {
        $columns = Country::generalColumns();

        $validColumns = Helpers::columns('states');

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        return Country::select($columns)->whereHas(

            'states',

            function(Builder $builder) use ($value, $column) { $builder->where($column, $value); }

        )->get();
    }

}
