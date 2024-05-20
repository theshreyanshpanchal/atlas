<?php

namespace Laraverse\Atlas\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    protected $table = 'cities';

    protected $guarded = [];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public static function generalColumns(): array
    {
        return [ 'id', 'name', 'latitude', 'longitude' ];
    }

    public static function generalColumnsWithForeign(): array
    {
        return [ 'id', 'state_id', 'name', 'latitude', 'longitude' ];
    }

    public static function relationalColumns(): string
    {
        return 'id,state_id,name,latitude,longitude' ;
    }
}
