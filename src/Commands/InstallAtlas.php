<?php

namespace Laraverse\Atlas\Commands;

use Illuminate\Console\Command;
use Laraverse\Atlas\Enums\Tables;

class InstallAtlas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'atlas:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Atlas';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        $this->newLine();

        $this->comment('Installing Atlas...');

        $this->newLine();

        // $this->publishConfiguration($force = true);

        if ($this->confirm('Run database migrations and seeder?', true)) {
            
            $this->migrations();

            $this->call('db:seed', ['--class' => 'Laraverse\\Atlas\\Database\\Seeders\\AtlasSeeder']);
        
        }

        $this->newLine();

        $this->comment('Atlas is now installed 🌍');

        $this->newLine();

        $this->line('Please show some love for Atlas by giving a star on GitHub ⭐️');

        $this->info('https://github.com/theshreyanshpanchal/atlas');

        $this->newLine(3);

    }

    /**
     * Migrate the only tables which facilities are enabled form the config.
     */
    private function migrations(): void
    {
        $root = "vendor/laraverse/atlas/database/migrations/";

        $facilities = config('atlas.facilities.enabled') ?? [];

        if (
            in_array(Tables::COUNTRIES, $facilities) ||
            in_array(Tables::STATES, $facilities) ||
            in_array(Tables::CITIES, $facilities)
        ) {
            $file = Tables::getFile(Tables::COUNTRIES);

            $this->call('migrate', [ '--path' => $root . $file ]);
        }

        if (
            in_array(Tables::STATES, $facilities) ||
            in_array(Tables::CITIES, $facilities)
        ) {
            $file = Tables::getFile(Tables::STATES);

            $this->call('migrate', [ '--path' => $root . $file ]);
        }

        if (in_array(Tables::CURRENCIES, $facilities)) {
            $file = Tables::getFile(Tables::CURRENCIES);

            $this->call('migrate', [ '--path' => $root . $file ]);
        }

        if (in_array(Tables::TIMEZONES, $facilities)) {
            $file = Tables::getFile(Tables::TIMEZONES);

            $this->call('migrate', [ '--path' => $root . $file ]);
        }

        if (
            in_array(Tables::COUNTRIES, $facilities) &&
            in_array(Tables::TIMEZONES, $facilities)
        ) {
            $file = Tables::getFile(Tables::COUNTRY_TIMEZONES);

            $this->call('migrate', [ '--path' => $root . $file ]);
        }

        if (
            in_array(Tables::COUNTRIES, $facilities) &&
            in_array(Tables::CURRENCIES, $facilities)
        ) {
            $file = Tables::getFile(Tables::COUNTRY_CURRENCIES);

            $this->call('migrate', [ '--path' => $root . $file ]);
        }

        if (in_array(Tables::PAYMENT_METHODS, $facilities)) {
            $file = Tables::getFile(Tables::PAYMENT_METHODS);

            $this->call('migrate', [ '--path' => $root . $file ]);
        }

        if (in_array(Tables::PAYMENT_PRODUCTS, $facilities)) {
            $file = Tables::getFile(Tables::PAYMENT_PRODUCTS);

            $this->call('migrate', [ '--path' => $root . $file ]); 
        }

        if (in_array(Tables::CONTINENTS, $facilities)) {
            $file = Tables::getFile(Tables::CONTINENTS);

            $this->call('migrate', [ '--path' => $root . $file ]);
        }

        if (
            in_array(Tables::COUNTRIES, $facilities) &&
            in_array(Tables::PAYMENT_PRODUCTS, $facilities)
        ) {
            $file = Tables::getFile(Tables::COUNTRY_PAYMENT_PRODUCTS);

            $this->call('migrate', [ '--path' => $root . $file ]);
        }

        if (
            in_array(Tables::PAYMENT_METHODS, $facilities) &&
            in_array(Tables::PAYMENT_PRODUCTS, $facilities)
        ) {
            $file = Tables::getFile(Tables::PAYMENT_METHOD_PRODUCTS);

            $this->call('migrate', [ '--path' => $root . $file ]);
        }

        if (in_array(Tables::CITIES, $facilities)) {
            $file = Tables::getFile(Tables::CITIES);

            $this->call('migrate', [ '--path' => $root . $file ]);
        }
    }

    /**
     * Publishes configuration for the Service Provider.
     *
     * @param  bool  $forcePublish
     */
    private function publishConfiguration($forcePublish = false): void
    {
        $params = [ '--provider' => "Laraverse\Atlas\AtlasServiceProvider", '--tag' => 'atlas' ];

        if ($forcePublish === true) { $params['--force'] = true; }

        $this->call('vendor:publish', $params);
    }
}