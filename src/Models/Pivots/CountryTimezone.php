<?php

namespace Laraverse\Atlas\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CountryTimezone extends Pivot
{
    protected $table = 'country_timezones';

    protected $guarded = [];

    public $timestamps = false;
}
