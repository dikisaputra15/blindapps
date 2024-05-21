<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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
        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        $icats = DB::table('wp_terms')
            ->join('wp_term_taxonomy', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
            ->join('wp_term_relationships', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
            ->join('wp_posts', 'wp_posts.ID', '=', 'wp_term_relationships.object_id')
            ->join('wp_w2gm_locations_relationships', 'wp_posts.ID', '=', 'wp_w2gm_locations_relationships.post_id')
            ->join('wp_lokasi', 'wp_w2gm_locations_relationships.location_id', '=', 'wp_lokasi.lokasi_id')
            ->select('wp_posts.ID', 'wp_posts.post_title', 'wp_w2gm_locations_relationships.address_line_1', 'wp_lokasi.lokasi_name', 'wp_lokasi.province_name', 'wp_w2gm_locations_relationships.map_coords_1', 'wp_w2gm_locations_relationships.map_coords_2', 'wp_terms.name AS incident_category', 'wp_w2gm_locations_relationships.number_of_incident', 'wp_w2gm_locations_relationships.number_of_injuries', 'wp_w2gm_locations_relationships.number_of_fatalities', 'wp_w2gm_locations_relationships.additional_info', 'wp_posts.post_date', 'wp_terms.name') 
            ->where('wp_posts.post_status', 'publish')
            ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
            ->where(function($query) {
                $query->where('wp_terms.term_id', 392)
                      ->orWhere('wp_terms.term_id', 433)
                      ->orWhere('wp_terms.term_id', 391);
            })
            ->get();
        
        Log::info('Category:', $icat->toArray());
        $this->info('Category: ' . $icat->count());

        // DB::table('statistiks')->insert([
        //     'post_id_cat' => '11',
        //     'listing_date' => NULL,
        //     'post_title' => 'tes',
        //     'address' => 'jl akmal',
        //     'regency_city' => 'oku selatan',
        //     'province_name' => 'sumsel',
        //     'country' => 'indonesia',
        //     'location' => '093856385',
        //     'incident_categories' => 'security incident',
        //     'incident_type' => NULL,
        //     'sub_incident_type' => NULL,
        //     'social_conflict' => NULL,
        //     'weapon_type' => NULL,
        //     'actor' => NULL,
        //     'actor_type' => NULL,
        //     'target' => NULL,
        //     'target_type' => NULL,
        //     'number_of_incident' => '1',
        //     'number_of_injuries' => '1',
        //     'number_of_fatalities' => '1',
        //     'additional_info' => 'tes 12345 oke'
        // ]);

        // $this->info('Success');
    }
}
