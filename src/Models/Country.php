<?php

namespace Laraverse\Atlas\Models;

use Laraverse\Atlas\Models\Pivots\CountryCurrency;
use Laraverse\Atlas\Models\Pivots\CountryPaymentProduct;
use Laraverse\Atlas\Models\Pivots\CountryTimezone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    protected $table = 'countries';

    protected $guarded = [];

    protected $casts = [ 'translations' => 'array' ];

    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    public function timezones(): BelongsToMany
    {
        return $this->belongsToMany(Timezone::class, 'country_timezones')->using(CountryTimezone::class);
    }

    public function currencies(): BelongsToMany
    {
        return $this->belongsToMany(Currency::class, 'country_currencies')->using(CountryCurrency::class);
    }

    public function paymentProducts(): BelongsToMany
    {
        return $this->belongsToMany(PaymentProduct::class, 'country_payment_products')->using(CountryPaymentProduct::class);
    }

    public static function generalColumns(): array
    {
        return [ 'id', 'name', 'iso3', 'iso2', 'phone_code', 'native', 'capital', 'latitude', 'longitude', 'emoji', 'emoji_u', 'tld', 'translations' ];
    }

    public static function generalColumnsWithForeign(): array
    {
        return [ 'id', 'state_id', 'name', 'iso3', 'iso2', 'phone_code', 'native', 'capital', 'latitude', 'longitude', 'emoji', 'emoji_u', 'tld', 'translations' ];
    }
}
