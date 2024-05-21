<?php

namespace Laraverse\Atlas\Exceptions;

use RuntimeException;

class InvalidColumn extends RuntimeException
{
    public static function notFound(string $column, string $table): self
    {
        return new self("The column named '$column' was not found in the '$table' table.");
    }

    public static function notAllowed(string $column, array $allowed): self
    {
        $allowed = collect($allowed)->implode(', ');

        return new self("Given column $column is not allowed for the eloquent operation. Allowed columns are: $allowed");
    }

    public static function notSpecified(array $allowed): self
    {
        $allowed = collect($allowed)->implode(', ');
        
        return new self("Please specify valid column. Allowed columns are: $allowed");
    }
}
