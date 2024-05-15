<?php

namespace Atlas\Console\Commands;

use Illuminate\Console\Command;

class Install extends Command
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

        if ($this->confirm('Run database migrations and seeder?', true)) {
            
            $this->call('migrate');

            $this->call('db:seed', ['--class' => 'Atlas']);
        
        }

        $this->newLine();

        $this->comment('Atlas is now installed 🌍');

        $this->newLine();

        $this->line('Please show some love for Atlas by giving a star on GitHub ⭐️');

        $this->info('https://github.com/Shreyansh1426/atlas');

        $this->newLine(3);

    }
}