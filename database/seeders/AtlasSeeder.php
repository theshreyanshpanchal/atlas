<?php

namespace Laraverse\Atlas\Database\Seeders;

use Laraverse\Atlas\Models\Continent;
use Laraverse\Atlas\Models\Country;
use Laraverse\Atlas\Models\Currency;
use Laraverse\Atlas\Models\PaymentMethod;
use Laraverse\Atlas\Models\PaymentProduct;
use Laraverse\Atlas\Models\Pivots\CountryCurrency;
use Laraverse\Atlas\Models\Pivots\CountryPaymentProduct;
use Laraverse\Atlas\Models\Pivots\CountryState;
use Laraverse\Atlas\Models\Pivots\CountryTimezone;
use Laraverse\Atlas\Models\Pivots\PaymentMethodProduct;
use Laraverse\Atlas\Models\State;
use Laraverse\Atlas\Models\Timezone;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AtlasSeeder extends Seeder
{
    public function run(): void
    {
        try {

            DB::beginTransaction();

            $this->truncate();

            $file = __DIR__ . '/Docs/atlas.json';

            if (file_exists($file)) {

                $content = file_get_contents($file);

                $content = json_decode($content);

                $this->atlas($content->atlas);

                $this->payment($content->payment);
            }

            DB::commit();

        } catch (Exception $e) {

            Log::error($e->getMessage());

            DB::rollBack();

        }
    }

    private function atlas(array $content): void
    {
        foreach ($content as $data) {

            $states = [];

            $stateNames = [];

            $timezones = [];

            $currencies = [];

            $country = $this->createCountry($data);

            foreach (optional($data)->states as $state) {

                $state = $this->createState($state);

                $stateNames[] = $state->id;

                $states[] = [ 'state_id' => $state->id, 'country_id' => $country->id ];
            }

            foreach (optional($data)->timezones as $timezone) {

                $timezone = $this->createTimezone($timezone);

                $timezones[] = [ 'timezone_id' => $timezone->id, 'country_id' => $country->id ];
            }

            $currency = $this->createCurrency($data);

            $currencies[] = [ 'currency_id' => $currency->id, 'country_id' => $country->id ];

            CountryState::insert($states);

            CountryCurrency::insert($currencies);

            CountryTimezone::insert($timezones);
        }
    }

    private function payment(object $content): void
    {
        $continents = $content->continents;

        $paymentMethods = $content->payment_methods;

        $paymentProducts = $content->payment_products;

        $atlas = $content->atlas;

        foreach ($continents as $data) {

            $this->createContinent($data);
        }

        foreach ($paymentMethods as $data) {

            $this->createPaymentMethod($data);
        }

        $methods = PaymentMethod::all()->keyBy('code');

        $paymentMethodProducts = [];

        foreach ($paymentProducts as $data) {

            $paymentMethodCode = Str::upper( Str::replace( '-', '_', $data->paymentMethodReference ) );

            $product = $this->createPaymentProduct($data);

            $paymentMethodProducts[] = [

                'payment_method_id' => optional( $methods->get($paymentMethodCode) )->id,

                'payment_product_id' => $product->id
            ];
        }

        PaymentMethodProduct::insert($paymentMethodProducts);

        $countries = Country::all()->keyBy('iso2');

        $products = PaymentProduct::all()->keyBy('code');

        foreach ($atlas as $data) {

            $countryPaymentProducts = [];

            $countryCode = Str::upper( $data->code );

            $paymentProducts = $data->paymentProducts;

            foreach ($paymentProducts as $data) {

                $paymentProductCode = Str::upper( Str::replace( '-', '_', $data->code ) );

                $countryPaymentProducts[] = [

                    'country_id' => optional( $countries->get($countryCode) )->id,

                    'payment_product_id' => optional( $products->get($paymentProductCode) )->id,
                ];
            }

            CountryPaymentProduct::insert($countryPaymentProducts);
        }
    }

    private function truncate(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        CountryState::truncate();

        CountryCurrency::truncate();

        CountryTimezone::truncate();

        PaymentMethodProduct::truncate();

        CountryPaymentProduct::truncate();

        State::truncate();

        Currency::truncate();

        Timezone::truncate();

        Country::truncate();

        PaymentMethod::truncate();

        PaymentProduct::truncate();

        Continent::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

    private function createState(object $data): State
    {
        return State::create(
            [
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
}
