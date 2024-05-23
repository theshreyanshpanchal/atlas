<?php

use Laraverse\Atlas\Enums\Tables;

return [

    /*
    |--------------------------------------------------------------------------
    | Enabled facilities
    |--------------------------------------------------------------------------
    */
    'enabled' => [
        // Tables::CITIES,
        Tables::COUNTRIES,
        Tables::CURRENCIES,
        Tables::PAYMENT_METHODS,
        Tables::PAYMENT_PRODUCTS,
        Tables::STATES,
        Tables::TIMEZONES,
        Tables::CONTINENTS,
    ],

    /*
    |--------------------------------------------------------------------------
    | Dependencies for the facilities
    |--------------------------------------------------------------------------
    */
    'dependencies' => [

        Tables::CITIES => [
            Tables::COUNTRIES,
            Tables::STATES,
            Tables::CITIES,
        ],

        Tables::COUNTRIES => [
            Tables::COUNTRIES,
        ],

        Tables::CURRENCIES => [
            Tables::CURRENCIES,
        ],

        Tables::PAYMENT_METHODS => [
            Tables::PAYMENT_METHODS,
        ],

        Tables::PAYMENT_PRODUCTS => [
            Tables::PAYMENT_METHODS,
            Tables::PAYMENT_PRODUCTS,
        ],

        Tables::STATES => [
            Tables::COUNTRIES,
            Tables::STATES,
        ],

        Tables::TIMEZONES => [
            Tables::TIMEZONES,
        ],

        Tables::CONTINENTS => [
            Tables::CONTINENTS,
        ],

        Tables::COUNTRY_CURRENCIES => [
            Tables::COUNTRIES,
            Tables::CURRENCIES,
            Tables::COUNTRY_CURRENCIES,
        ],

        Tables::COUNTRY_TIMEZONES => [
            Tables::COUNTRIES,
            Tables::TIMEZONES,
            Tables::COUNTRY_TIMEZONES,
        ],

        Tables::COUNTRY_PAYMENT_PRODUCTS => [
            Tables::COUNTRIES,
            Tables::PAYMENT_PRODUCTS,
            Tables::COUNTRY_PAYMENT_PRODUCTS,
        ],

        Tables::PAYMENT_METHOD_PRODUCTS => [
            Tables::PAYMENT_METHODS,
            Tables::PAYMENT_PRODUCTS,
            Tables::PAYMENT_METHOD_PRODUCTS,
        ],

    ]

];
