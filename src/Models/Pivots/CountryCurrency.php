<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CountryCurrency extends Pivot
{
    protected $table = 'country_currencies';

    protected $guarded = [];

    public $timestamps = false;
}
