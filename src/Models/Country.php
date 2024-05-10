<?php

namespace App\Models;

use App\Models\Pivots\CountryCurrency;
use App\Models\Pivots\CountryPaymentProduct;
use App\Models\Pivots\CountryState;
use App\Models\Pivots\CountryTimezone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Country extends Model
{
    protected $table = 'countries';

    protected $guarded = [];

    protected $casts = [ 'translations' => 'array' ];

    public function states(): BelongsToMany
    {
        return $this->belongsToMany(State::class, 'country_states')->using(CountryState::class);
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
}
