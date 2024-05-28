<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IncidenttypeController extends Controller
{
    public function index()
    {
        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        $tgl_coba = '2023-06-13';

        $itypes = DB::table('wp_w2gm_locations_relationships')
            ->join('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_w2gm_locations_relationships.post_id')
            ->join('wp_term_taxonomy', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
            ->join('wp_terms', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
            ->join('wp_posts', 'wp_posts.ID', '=', 'wp_w2gm_locations_relationships.post_id')
            ->select('wp_w2gm_locations_relationships.post_id', 'wp_terms.name', 'wp_posts.post_date') 
            ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_coba)
            ->where(function($query) {
                $query->where('wp_terms.term_id', 434)
                      ->orWhere('wp_terms.term_id', 435)
                      ->orWhere('wp_terms.term_id', 8065)
                      ->orWhere('wp_terms.term_id', 6829)
                      ->orWhere('wp_terms.term_id', 16127)
                      ->orWhere('wp_terms.term_id', 16126)
                      ->orWhere('wp_terms.term_id', 480)
                      ->orWhere('wp_terms.term_id', 438)
                      ->orWhere('wp_terms.term_id', 436)
                      ->orWhere('wp_terms.term_id', 479)
                      ->orWhere('wp_terms.term_id', 437);
            })
            ->get();

            
            if($itypes->isNotEmpty()){
                foreach ($itypes as $itype){
                    DB::table('statistiks')
                        ->where('post_id_cat', $itype->post_id)
                        ->update([
                            'incident_type' => $itype->name
                        ]);
                }
            }

            echo "sukses";
            
    }
}
