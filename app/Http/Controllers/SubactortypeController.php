<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubactortypeController extends Controller
{
    public function index()
    {
        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = '2024-06-02';

        $subactortypes = DB::table('wp_w2gm_locations_relationships')
        ->join('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_w2gm_locations_relationships.post_id')
        ->join('wp_term_taxonomy', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
        ->join('wp_terms', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
        ->join('wp_posts', 'wp_posts.ID', '=', 'wp_w2gm_locations_relationships.post_id')
        ->select('wp_w2gm_locations_relationships.id', 'wp_terms.name')
        ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
        ->where(function($query) {
            $query->Where('wp_terms.term_id', 16737)
                ->orWhere('wp_terms.term_id', 16736)
                ->orWhere('wp_terms.term_id', 16739)
                ->orWhere('wp_terms.term_id', 16738)
                ->orWhere('wp_terms.term_id', 16724)
                ->orWhere('wp_terms.term_id', 16725)
                ->orWhere('wp_terms.term_id', 16726)
                ->orWhere('wp_terms.term_id', 16727)
                ->orWhere('wp_terms.term_id', 16728)
                ->orWhere('wp_terms.term_id', 16729)
                ->orWhere('wp_terms.term_id', 16730)
                ->orWhere('wp_terms.term_id', 18115)
                ->orWhere('wp_terms.term_id', 18116)
                ->orWhere('wp_terms.term_id', 18117)
                ->orWhere('wp_terms.term_id', 16731)
                ->orWhere('wp_terms.term_id', 16732)
                ->orWhere('wp_terms.term_id', 16733)
                ->orWhere('wp_terms.term_id', 16734)
                ->orWhere('wp_terms.term_id', 16952);
            })
        ->get();

        if($subactortypes->isNotEmpty()){
            foreach ($subactortypes as $subactortype){
                DB::table('indostatistiknews')
                    ->where('id_listing', $subactortype->id)
                    ->update([
                        'sub_actor_type' => $subactortype->name
                    ]);
            }
            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
