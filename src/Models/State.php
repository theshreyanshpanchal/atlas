<?php

namespace Laraverse\Atlas\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    protected $table = 'states';

    protected $guarded = [];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
    
    public static function generalColumns(): array
    {
        return [ 'id', 'name', 'code', 'latitude', 'longitude' ];
    }

    public static function relationalColumns(): string
    {
        return 'id,name,code,latitude,longitude' ;
    }
}
