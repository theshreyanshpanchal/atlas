<?php

namespace Laraverse\Atlas\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Laraverse\Atlas\Exceptions\InvalidColumn;
use Laraverse\Atlas\Helpers;
use Laraverse\Atlas\Models\City;
use Laraverse\Atlas\Models\State;

trait Cities {

    /**
     * get cities based on specified state.
     */
    public function getCities(string $value, string $column = 'id'): Collection
    {
        $columns = City::generalColumns();

        $validColumns = Helpers::columns('states', ['country_id', 'code']);

        if (empty($column)) { throw InvalidColumn::notSpecified($validColumns); }

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        return City::select($columns)->whereHas(

            'state',

            function(Builder $builder) use ($value, $column) { $builder->where($column, $value); }

        )->get();
    }

    /**
     * get city by specified column.
     */
    public function getCityBy(string $value, string $column = 'id'): ?City
    {
        $columns = City::generalColumns();

        $validColumns = Helpers::columns('cities', ['state_id']);

        if (empty($column)) { throw InvalidColumn::notSpecified($validColumns); }

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        return City::select($columns)->where($column, $value)->first();
    }

    /**
     * get city by specified column.
     */
    public function getStateByCity(string $value, string $column = 'id'): ?State
    {
        $columns = City::generalColumnsWithForeign();

        $relationalColumns = State::relationalColumns();

        $validColumns = Helpers::columns('cities', ['state_id']);

        if (empty($column)) { throw InvalidColumn::notSpecified($validColumns); }

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        $city = City::select($columns)->with('state:' . $relationalColumns)->where($column, $value)->first();

        return optional($city)->state;
    }

}
