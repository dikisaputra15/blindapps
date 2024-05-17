<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AutoStatistik extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statistik:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Statistik added';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('statistiks')->insert([
            'post_id_cat' => '11',
            'listing_date' => NULL,
            'post_title' => 'tes',
            'address' => 'jl akmal',
            'regency_city' => 'oku selatan',
            'province_name' => 'sumsel',
            'country' => 'indonesia',
            'location' => '093856385',
            'incident_categories' => 'security incident',
            'incident_type' => NULL,
            'sub_incident_type' => NULL,
            'social_conflict' => NULL,
            'weapon_type' => NULL,
            'actor' => NULL,
            'actor_type' => NULL,
            'target' => NULL,
            'target_type' => NULL,
            'number_of_incident' => '1',
            'number_of_injuries' => '1',
            'number_of_fatalities' => '1',
            'additional_info' => 'tes 12345 oke'
        ]);

        $this->info('Success');
    }
}
