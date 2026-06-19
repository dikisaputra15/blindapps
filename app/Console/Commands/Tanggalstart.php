<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class Tanggalstart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:runtanggalstart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'tanggal start added';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('https://id.code69.my.id/tanggalstart');

        if ($response->successful()) {
            $this->info('Tanggal start accessed successfully.');
        } else {
            $this->error('Failed to access tanggal start.');
        }
    }
}
