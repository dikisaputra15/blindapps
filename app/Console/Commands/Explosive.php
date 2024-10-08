<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Explosive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:runexplosive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'explosive added';

    /**
     * Execute the console command.
     */

     public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('https://id.code69.my.id/explosivetype');

        if ($response->successful()) {
            $this->info('Weapon accessed successfully.');
        } else {
            $this->error('Failed to access weapon.');
        }
    }
}
