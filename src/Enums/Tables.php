<?php

namespace Laraverse\Atlas\Enums;

enum Tables: string
{
    const CITIES = 'cities';
    const COUNTRIES = 'countries';
    const CURRENCIES = 'currencies';
    const PAYMENT_METHODS = 'payment_methods';
    const PAYMENT_PRODUCTS = 'payment_products';
    const STATES = 'states';
    const TIMEZONES = 'timezones';
    const CONTINENTS = 'continents';

    const COUNTRY_CURRENCIES = 'country_currencies';
    const COUNTRY_TIMEZONES = 'country_timezones';
    const COUNTRY_PAYMENT_PRODUCTS = 'country_payment_products';
    const PAYMENT_METHOD_PRODUCTS = 'payment_method_products';

    public static function getFile(string $type): ?string
    {
        return match ($type) {

            self::CITIES => '2024_05_09_111135_create_cities_table.php',
            
            self::COUNTRIES => '2024_05_04_081733_create_countries_table.php',
            
            self::CURRENCIES => '2024_05_04_084820_create_currencies_table.php',
            
            self::PAYMENT_METHODS => '2024_05_08_095730_create_payment_methods_table.php',
            
            self::PAYMENT_PRODUCTS => '2024_05_08_095736_create_payment_products_table.php',
            
            self::STATES => '2024_05_04_083701_create_states_table.php',
            
            self::TIMEZONES => '2024_05_04_090313_create_timezones_table.php',
            
            self::CONTINENTS => '2024_05_08_095830_create_continents_table.php',
            
            self::COUNTRY_CURRENCIES => '2024_05_07_130620_create_country_currencies_table.php',
            
            self::COUNTRY_TIMEZONES => '2024_05_07_130430_create_country_timezones_table.php',
            
            self::COUNTRY_PAYMENT_PRODUCTS => '2024_05_08_120044_create_country_payment_products_table.php',
            
            self::PAYMENT_METHOD_PRODUCTS => '2024_05_08_120123_create_payment_method_products_table.php',

            default => '',

        };
    }
}
