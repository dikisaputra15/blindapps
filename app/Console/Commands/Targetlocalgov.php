<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class Targetlocalgov extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:runtargetlocalgov';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'targetlocalgov added';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
         $response = Http::get('https://id.code69.my.id/targetlocalgov');

        if ($response->successful()) {
            $this->info('Target local gov accessed successfully.');
        } else {
            $this->error('Failed to access Target local gov.');
        }
    }
}
