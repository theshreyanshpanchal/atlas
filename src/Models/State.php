<?php

namespace Atlas\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    protected $guarded = [];

    public static function generalColumns(): array
    {
        return [ 'id', 'name', 'code', 'latitude', 'longitude' ];
    }

    public static function relationalColumns(): string
    {
        return 'id,name,code,latitude,longitude' ;
    }
}
