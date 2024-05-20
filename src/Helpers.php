<?php

namespace Laraverse\Atlas;

use Illuminate\Support\Facades\Schema;

class Helpers {


    /**
     * get table columns from schema.
     */
    public static function columns(string $table, array $needToRemove = []): array
    {
        $columns = Schema::getColumnListing($table) ?? [];

        $mustBeRemove = ['latitude', 'longitude', 'created_at', 'updated_at'];

        if (! empty($needToRemove)) { $mustBeRemove = array_merge($mustBeRemove, $needToRemove); }

        return array_diff($columns, $mustBeRemove);
    }

}
