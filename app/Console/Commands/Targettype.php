<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class Targettype extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:runtargettype';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'targettype added';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('http://127.0.0.1:8000/targettype');

        if ($response->successful()) {
            $this->info('Target Type accessed successfully.');
        } else {
            $this->error('Failed to access target type.');
        }
    }
}
