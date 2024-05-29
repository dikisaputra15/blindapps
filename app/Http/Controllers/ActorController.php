<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActorController extends Controller
{
    public function index()
    {
        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = '2023-06-13';

        $actors = DB::table('wp_w2gm_locations_relationships')
        ->join('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_w2gm_locations_relationships.post_id')
        ->join('wp_term_taxonomy', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
        ->join('wp_terms', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
        ->join('wp_posts', 'wp_posts.ID', '=', 'wp_w2gm_locations_relationships.post_id')
        ->select('wp_w2gm_locations_relationships.post_id', 'wp_terms.name')
        ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
        ->where(function($query) {
            $query->where('wp_terms.term_id', 16165)
                ->orWhere('wp_terms.term_id', 16152)
                ->orWhere('wp_terms.term_id', 16158)
                ->orWhere('wp_terms.term_id', 16159)
                ->orWhere('wp_terms.term_id', 16153)
                ->orWhere('wp_terms.term_id', 16169)
                ->orWhere('wp_terms.term_id', 16150)
                ->orWhere('wp_terms.term_id', 16163)
                ->orWhere('wp_terms.term_id', 16162)
                ->orWhere('wp_terms.term_id', 16161)
                ->orWhere('wp_terms.term_id', 16166)
                ->orWhere('wp_terms.term_id', 16170)
                ->orWhere('wp_terms.term_id', 16167)
                ->orWhere('wp_terms.term_id', 16168)
                ->orWhere('wp_terms.term_id', 16151)
                ->orWhere('wp_terms.term_id', 16156)
                ->orWhere('wp_terms.term_id', 16157)
                ->orWhere('wp_terms.term_id', 16171)
                ->orWhere('wp_terms.term_id', 16160)
                ->orWhere('wp_terms.term_id', 16369)
                ->orWhere('wp_terms.term_id', 16164);
            })
        ->get();

        if($actors->isNotEmpty()){
            foreach ($actors as $actor){
                DB::table('statistiks')
                    ->where('post_id_cat', $actor->post_id)
                    ->update([
                        'actor' => $actor->name
                    ]);
            }
            echo "sukses";
        }

    }
}
