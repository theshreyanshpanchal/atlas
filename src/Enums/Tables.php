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
}
