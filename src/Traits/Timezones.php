<?php

namespace Laraverse\Atlas\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Laraverse\Atlas\Exceptions\InvalidColumn;
use Laraverse\Atlas\Helpers;
use Laraverse\Atlas\Models\Country;
use Laraverse\Atlas\Models\Timezone;

trait Timezones {

    /**
     * get timezones.
     */
    public function getTimezones(): Collection
    {
        $columns = Timezone::generalColumns();

        return Timezone::select($columns)->get();
    }

    /**
     * get timezone by specified column.
     */
    public function getTimezoneBy(string $value, string $column = 'abbreviation'): ?Timezone
    {
        $columns = Timezone::generalColumns();

        $validColumns = Helpers::columns('timezones', ['gmt_offset', 'gmt_offset_name']);

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        return Timezone::select($columns)->where($column, $value)->first();
    }

    /**
     * get countries based on supported currency.
     */
    public function getCountryBasedOnTimezone(string $value, string $column = 'abbreviation'): Country|Collection
    {
        $columns = Country::generalColumns();

        $validColumns = Helpers::columns('timezones', ['gmt_offset', 'gmt_offset_name']);

        if (! in_array($column, $validColumns)) { throw InvalidColumn::notAllowed($column, $validColumns); }

        return Country::select($columns)->whereHas(

            'timezones',

            function(Builder $builder) use ($value, $column) { $builder->where($column, $value); }

        )->get();
    }

}
