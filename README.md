<p align="center"><img src="/resources/banners/atlas-dark.png" alt="Atlas"></p>

# Atlas

Laravel package providing comprehensive global data for your next project

## Installation

To install the package, use Composer:

```bash
composer require laraverse/atlas
```

Optional: The service provider will automatically get registered. Or you may manually add the service provider in bootstrap/providers.php file:


```php
return [
    // ...
    Laraverse\Atlas\AtlasServiceProvider::class
];
```

You should publish the models, migration, views, assets and the config files with:

```bash
php artisan vendor:publish --provider="Laraverse\Atlas\AtlasServiceProvider"
```

Note: After vendor files are published, access atlas config files in the project root. Enable or disable facilities via config/atlas/facilities.php.

```bash
return [
    'enabled' => [
        # Tables::CITIES, (By default, It's disabled due to its large data size)
        Tables::COUNTRIES,
        Tables::CURRENCIES,
        Tables::PAYMENT_METHODS,
        Tables::PAYMENT_PRODUCTS,
        Tables::STATES,
        Tables::TIMEZONES,
        Tables::CONTINENTS,
    ],
]
```

You should install the atlas with:

```bash
# It will setup the atlas to serve comprehensive global data.
php artisan atlas:install
```

Note: Seeding the data will take time due to its large size.

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
        $client->getCurrencies();
    }
}
```
## Documentation and Usage Instructions

#### You can access the built-in documentation module by navigating to `/atlas/docs` after setting up Atlas.

Alternatively, Check out the [Documentation](DOCUMENTATION.md) for detailed usage instructions.

## Credits

- [Shreyansh Panchal](https://github.com/theshreyanshpanchal)
- [Infynno Solutions LLP](https://infynno.com)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.