<?php

namespace Atlas\Models;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    protected $table = 'timezones';

    protected $guarded = [];

    public static function generalColumns(): array
    {
        return [ 'id', 'zone_name', 'gmt_offset', 'gmt_offset_name', 'abbreviation', 'tz_name' ];
    }

    public static function relationalColumns(): string
    {
        return 'id,zone_name,gmt_offset,gmt_offset_name,abbreviation,tz_name' ;
    }
}
