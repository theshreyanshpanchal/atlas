<?php

namespace Laraverse\Atlas\Database\Seeders;

use Laraverse\Atlas\Models\Continent;
use Laraverse\Atlas\Models\Country;
use Laraverse\Atlas\Models\Currency;
use Laraverse\Atlas\Models\PaymentMethod;
use Laraverse\Atlas\Models\PaymentProduct;
use Laraverse\Atlas\Models\Pivots\CountryCurrency;
use Laraverse\Atlas\Models\Pivots\CountryPaymentProduct;
use Laraverse\Atlas\Models\Pivots\CountryTimezone;
use Laraverse\Atlas\Models\Pivots\PaymentMethodProduct;
use Laraverse\Atlas\Models\State;
use Laraverse\Atlas\Models\Timezone;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Laraverse\Atlas\Enums\Tables;
use Laraverse\Atlas\Models\City;

class AtlasSeeder extends Seeder
{
    public function run(): void
    {
        try {

            DB::beginTransaction();

            $this->truncate();

            $file = __DIR__ . '/../../public/docs/atlas.json';

            if (file_exists($file)) {

                $content = file_get_contents($file);

                $content = json_decode($content);

                $facilities = config('atlas.facilities.enabled') ?? [];

                $this->atlas($content->atlas, $facilities);

                $this->payment($content->payment, $facilities);

                if (in_array(Tables::CITIES, $facilities)) {

                    $this->cities($content->cities);

                }
            }

            DB::commit();

        } catch (Exception $e) {

            Log::error($e->getMessage());

            DB::rollBack();

        }
    }

    private function atlas(array $content, array $facilities): void
    {
        foreach ($content as $data) {

            $timezones = [];

            $currencies = [];

            if (
                in_array(Tables::COUNTRIES, $facilities) ||
                in_array(Tables::STATES, $facilities) ||
                in_array(Tables::CITIES, $facilities)
            ) {

                $country = $this->createCountry($data);

            }

            if (
                in_array(Tables::STATES, $facilities) ||
                in_array(Tables::CITIES, $facilities)
            ) {

                foreach (optional($data)->states as $state) {
    
                    $this->createState($country->id, $state);
                }

            }

            if (in_array(Tables::TIMEZONES, $facilities)) {

                foreach (optional($data)->timezones as $timezone) {

                    $timezone = $this->createTimezone($timezone);

                    if (
                        in_array(Tables::COUNTRIES, $facilities) &&
                        in_array(Tables::TIMEZONES, $facilities)
                    ) {

                        $timezones[] = [ 'timezone_id' => $timezone->id, 'country_id' => $country->id ];

                    }
    
                }

            }

            if (in_array(Tables::CURRENCIES, $facilities)) {

                $currency = $this->createCurrency($data);

                if (
                    in_array(Tables::COUNTRIES, $facilities) &&
                    in_array(Tables::CURRENCIES, $facilities)
                ) {
                
                    $currencies[] = [ 'currency_id' => $currency->id, 'country_id' => $country->id ];
                
                }

            }

            if (
                in_array(Tables::COUNTRIES, $facilities) &&
                in_array(Tables::CURRENCIES, $facilities)
            ) {

                CountryCurrency::insert($currencies);
            
            }

            if (
                in_array(Tables::COUNTRIES, $facilities) &&
                in_array(Tables::TIMEZONES, $facilities)
            ) {

                CountryTimezone::insert($timezones);
            
            }

        }
    }

    private function payment(object $content, array $facilities): void
    {
        $continents = $content->continents;

        $paymentMethods = $content->payment_methods;

        $paymentProducts = $content->payment_products;

        $atlas = $content->atlas;

        if (in_array(Tables::CONTINENTS, $facilities)) {
        
            foreach ($continents as $data) {
    
                $this->createContinent($data);
            }
        
        }

        if (in_array(Tables::PAYMENT_METHODS, $facilities)) {
        
            foreach ($paymentMethods as $data) {
    
                $this->createPaymentMethod($data);
            }
        
        }

        $paymentMethodProducts = [];

        foreach ($paymentProducts as $data) {

            $paymentMethodCode = Str::upper( Str::replace( '-', '_', $data->paymentMethodReference ) );

            if (in_array(Tables::PAYMENT_PRODUCTS, $facilities)) {
            
                $product = $this->createPaymentProduct($data);
            
            }

            if (
                in_array(Tables::PAYMENT_METHODS, $facilities) &&
                in_array(Tables::PAYMENT_PRODUCTS, $facilities)
            ) {
                $methods = PaymentMethod::all()->keyBy('code');

                if (
                    ! is_null(optional( $methods->get($paymentMethodCode) )->id) &&
                    ! is_null($product->id)
                ) {
                    $paymentMethodProducts[] = [
    
                        'payment_method_id' => optional( $methods->get($paymentMethodCode) )->id,
    
                        'payment_product_id' => $product->id
                    ];
                }

            }
        }

        if (
            in_array(Tables::PAYMENT_METHODS, $facilities) &&
            in_array(Tables::PAYMENT_PRODUCTS, $facilities)
        ) {

            PaymentMethodProduct::insert($paymentMethodProducts);

        }

        if (
            in_array(Tables::COUNTRIES, $facilities) &&
            in_array(Tables::PAYMENT_PRODUCTS, $facilities)
        ) {

            $countries = Country::all()->keyBy('iso2');
    
            $products = PaymentProduct::all()->keyBy('code');
    
            foreach ($atlas as $data) {
    
                $countryPaymentProducts = [];
    
                $countryCode = Str::upper( $data->code );
    
                $paymentProducts = $data->paymentProducts;
    
                foreach ($paymentProducts as $data) {
    
                    $paymentProductCode = Str::upper( Str::replace( '-', '_', $data->code ) );
    
                    if (
                        ! is_null(optional( $countries->get($countryCode) )->id) &&
                        ! is_null(optional( $products->get($paymentProductCode) )->id)
                    ) {
                        $countryPaymentProducts[] = [
    
                            'country_id' => optional( $countries->get($countryCode) )->id,
    
                            'payment_product_id' => optional( $products->get($paymentProductCode) )->id,
                        ];
                    }
                }
    
                CountryPaymentProduct::insert($countryPaymentProducts);
            }

        }
    }

    private function cities(array $content): void
    {
        foreach ($content as $data) {

            $state = State::query()->where('name', $data->name)->where('code', $data->stateCode)->first();

            if ($state) {

                foreach ($data->cities as $city) {

                    $this->createCity($state->id, $city);

                }

            }
        }
    }

    private function truncate(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $tables = [
            Tables::CITIES,
            Tables::COUNTRIES,
            Tables::CURRENCIES,
            Tables::PAYMENT_METHODS,
            Tables::PAYMENT_PRODUCTS,
            Tables::STATES,
            Tables::TIMEZONES,
            Tables::CONTINENTS,
            Tables::COUNTRY_CURRENCIES,
            Tables::COUNTRY_TIMEZONES,
            Tables::COUNTRY_PAYMENT_PRODUCTS,
            Tables::PAYMENT_METHOD_PRODUCTS,
        ];

        foreach ($tables as $table) {

            if (Schema::hasTable($table)) {

                $model = Tables::getModel($table);

                $model::truncate();
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

    private function createState(string $countryId, object $data): State
    {
        return State::create(
            [
                'country_id' => $countryId,

                'code' => $data->stateCode,

                'name' => $data->name,

                'latitude' => optional($data)->latitude,

                'longitude' => optional($data)->longitude,
            ],
        );
    }

    private function createTimezone(object $data): Timezone
    {
        return Timezone::create(
            [
                'zone_name' => $data->zoneName,

                'gmt_offset' => optional($data)->gmtOffset,

                'gmt_offset_name' => optional($data)->gmtOffsetName,

                'abbreviation' => optional($data)->abbreviation,

                'tz_name' => optional($data)->tzName,
            ]
        );
    }

    private function createCurrency(object $data): Currency
    {
        return Currency::updateOrCreate(
            [
                'symbol' => $data->currencySymbol,

                'code' => $data->currency,
            ]
        );
    }

    private function createCountry(object $data): Country
    {
        return Country::create(
            [
                'iso2' => $data->iso2,

                'name' => $data->name,

                'iso3' => optional($data)->iso3,

                'phone_code' => $data->phoneCode,

                'native' => optional($data)->native,

                'capital' => optional($data)->capital,

                'latitude' => optional($data)->latitude,

                'longitude' => optional($data)->longitude,

                'emoji' => optional($data)->emoji,

                'emoji_u' => optional($data)->emojiU,

                'tld' => optional($data)->tld,

                'translations' => (array) $data->translations,
            ]
        );
    }

    private function createPaymentMethod(object $data): PaymentMethod
    {
        $code = Str::upper( Str::replace( '-', '_', $data->code ) );

        return PaymentMethod::create(
            [
                'name' => $data->name,

                'code' => $code,

                'order' => $data->order,
            ]
        );
    }

    private function createPaymentProduct(object $data): PaymentProduct
    {
        $code = Str::upper( Str::replace( '-', '_', $data->code ) );

        return PaymentProduct::create(
            [
                'name' => $data->name,

                'code' => $code,

                'logo' => $data->logo,

                'order' => $data->order,
            ]
        );
    }

    private function createContinent(object $data): Continent
    {
        return Continent::create(
            [
                'name' => $data->name,

                'code' => $data->code,
            ]
        );
    }

    private function createCity(string  $stateId, object $data): City
    {
        return City::create(
            [
                'state_id' => $stateId,

                'name' => $data->name,

                'latitude' => optional($data)->latitude,

                'longitude' => optional($data)->longitude
            ]
        );
    }
}
