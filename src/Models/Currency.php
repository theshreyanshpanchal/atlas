<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';

    protected $guarded = [];

    public static function generalColumns(): array
    {
        return [ 'id', 'code', 'symbol' ];
    }

    public static function relationalColumns(): string
    {
        return 'id,code,symbol' ;
    }
}
