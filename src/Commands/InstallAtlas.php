<?php

namespace Laraverse\Atlas\Commands;

use Illuminate\Console\Command;

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

        $this->publishConfiguration($force = true);

        if ($this->confirm('Run database migrations and seeder?', true)) {
            
            $this->call('migrate');

            $this->call('db:seed', ['--class' => 'Atlas']);
        
        }

        $this->newLine();

        $this->comment('Atlas is now installed 🌍');

        $this->newLine();

        $this->line('Please show some love for Atlas by giving a star on GitHub ⭐️');

        $this->info('https://github.com/theshreyanshpanchal/atlas');

        $this->newLine(3);

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