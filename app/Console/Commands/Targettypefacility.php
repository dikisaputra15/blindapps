<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class Targettypefacility extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:runtargettypefacility';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'targettypefacility added';

    /**
     * Execute the console command.
     */

     public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
         $response = Http::get('https://id.code69.my.id/targettypefacility');

        if ($response->successful()) {
            $this->info('Target type facility accessed successfully.');
        } else {
            $this->error('Failed to access Target type facility.');
        }
    }
}
