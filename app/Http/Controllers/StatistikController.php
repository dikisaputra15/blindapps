<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatistikController extends Controller
{
    public function index()
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

        
            if ($icats->isNotEmpty()){
                echo "ada data";
            }else{
                echo "tidak ada data";
            }

    }
}
