<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActortypeController extends Controller
{
    public function index()
    {
        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        $tgl_coba = '2023-06-13';

        $actortypes = DB::table('wp_w2gm_locations_relationships')
        ->join('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_w2gm_locations_relationships.post_id')
        ->join('wp_term_taxonomy', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
        ->join('wp_terms', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
        ->join('wp_posts', 'wp_posts.ID', '=', 'wp_w2gm_locations_relationships.post_id')
        ->select('wp_w2gm_locations_relationships.post_id', 'wp_terms.name') 
        ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_coba)
        ->where(function($query) {
            $query->where('wp_terms.term_id', 16155)
                ->orWhere('wp_terms.term_id', 16154)
                ->orWhere('wp_terms.term_id', 16173)
                ->orWhere('wp_terms.term_id', 16174)
                ->orWhere('wp_terms.term_id', 16172)
                ->orWhere('wp_terms.term_id', 16175)
                ->orWhere('wp_terms.term_id', 16335)
                ->orWhere('wp_terms.term_id', 16334)
                ->orWhere('wp_terms.term_id', 16176)
                ->orWhere('wp_terms.term_id', 16177)
                ->orWhere('wp_terms.term_id', 16178)
                ->orWhere('wp_terms.term_id', 16333)
                ->orWhere('wp_terms.term_id', 16179)
                ->orWhere('wp_terms.term_id', 16180)
                ->orWhere('wp_terms.term_id', 16181);
            })
        ->get();

        if($actortypes->isNotEmpty()){
            foreach ($actortypes as $actortype){
                DB::table('statistiks')
                    ->where('post_id_cat', $actortype->post_id)
                    ->update([
                        'actor_type' => $actortype->name
                    ]);
            }
        }

        echo "sukses";
    }
}
