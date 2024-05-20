<p align="center"><img src="/resources/banners/atlas-light.png" alt="Atlas"></p>

# Atlas

Laravel package providing comprehensive global data for your next project


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## Installation

To install the package, use Composer:

```bash
composer require laraverse/atlas
```

Optional: The service provider will automatically get registered. Or you may manually add the service provider:


```php
'providers' => [
    // ...
    Laraverse\Atlas\AtlasServiceProvider::class,
];
```

You should publish the models, migration, views, assets and the config files with:

```bash
php artisan vendor:publish --provider="Laraverse\Atlas\AtlasServiceProvider"
```

You should install the atlas with:

```bash
# It will migrate and seed the data which atlas will use later to serve comprehensive global data.
php artisan atlas:install
```

## Usage

In your project file include the atlas client like below:

```php
use Illuminate\Support\Collection;
use Laraverse\Atlas\Client;

class YourClass
{
    public function call(Client $client) : Collection
    {
        // Start using Atlas client.
        $client->getPaymentProducts();
    }
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


```php

$client->getCountries()
$client->getCountryBy()
$client->getCountryStates()
$client->getCountryCurrencies()
$client->getCountryTimezones()
$client->getCountryPaymentProducts()

$client->getCurrencies()
$client->getCurrencyBy()
$client->getCountriesBasedOnSupportedCurrency()

$client->getStates()
$client->getStateBy()
$client->getCountryBasedOnGivenState()
$client->getStateCurrencies()

$client->getTimezones()
$client->getTimezoneBy()
$client->getCountryBasedOnTimezone()

$client->getPaymentMethods()
$client->getPaymentMethodBy()
$client->getPaymentMethodProducts()

$client->getPaymentProducts()
$client->getPaymentProductBy()

$client->getCities()
$client->getCityBy()
$client->getStateByCity()

```