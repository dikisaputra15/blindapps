<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class Targetcommunity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:runtargetcommunity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'targetcommunity added';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('https://id.code69.my.id/targetcommunity');

        if ($response->successful()) {
            $this->info('Target community accessed successfully.');
        } else {
            $this->error('Failed to access Target community.');
        }
    }
}
