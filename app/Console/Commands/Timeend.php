<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class Timeend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:runtimeend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'time end added';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
         $response = Http::get('https://id.code69.my.id/timeend');

        if ($response->successful()) {
            $this->info('Time end accessed successfully.');
        } else {
            $this->error('Failed to access time end.');
        }
    }
}
