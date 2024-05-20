<?php

namespace Laraverse\Atlas\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CountryState extends Pivot
{
    protected $table = 'country_states';

    protected $guarded = [];

    public $timestamps = false;

}
