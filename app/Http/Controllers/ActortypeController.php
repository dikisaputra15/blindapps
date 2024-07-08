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
        // $tgl_coba = '2024-06-02';

        $actortypes = DB::table('wp_w2gm_locations_relationships')
        ->join('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_w2gm_locations_relationships.post_id')
        ->join('wp_term_taxonomy', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
        ->join('wp_terms', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
        ->join('wp_posts', 'wp_posts.ID', '=', 'wp_w2gm_locations_relationships.post_id')
        ->select('wp_w2gm_locations_relationships.id', 'wp_terms.name')
        ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
        ->where(function($query) {
            $query->Where('wp_terms.term_id', 16173)
                ->orWhere('wp_terms.term_id', 16174)
                ->orWhere('wp_terms.term_id', 16172)
                ->orWhere('wp_terms.term_id', 16175)
                ->orWhere('wp_terms.term_id', 16176)
                ->orWhere('wp_terms.term_id', 16177)
                ->orWhere('wp_terms.term_id', 16178)
                ->orWhere('wp_terms.term_id', 16333)
                ->orWhere('wp_terms.term_id', 16179)
                ->orWhere('wp_terms.term_id', 16180)
                ->orWhere('wp_terms.term_id', 16181)
                ->orWhere('wp_terms.term_id', 16740)
                ->orWhere('wp_terms.term_id', 11511)
                ->orWhere('wp_terms.term_id', 18114)
                ->orWhere('wp_terms.term_id', 16155)
                ->orWhere('wp_terms.term_id', 16908)
                ->orWhere('wp_terms.term_id', 18118)
                ->orWhere('wp_terms.term_id', 18228)
                ->orWhere('wp_terms.term_id', 18229)
                ->orWhere('wp_terms.term_id', 18230)
                ->orWhere('wp_terms.term_id', 18231)
                ->orWhere('wp_terms.term_id', 18232)
                ->orWhere('wp_terms.term_id', 18233)
                ->orWhere('wp_terms.term_id', 18234)
                ->orWhere('wp_terms.term_id', 18235)
                ->orWhere('wp_terms.term_id', 18236)
                ->orWhere('wp_terms.term_id', 16158)
                ->orWhere('wp_terms.term_id', 16953)
                ->orWhere('wp_terms.term_id', 16164)
                ->orWhere('wp_terms.term_id', 18120)
                ->orWhere('wp_terms.term_id', 18121)
                ->orWhere('wp_terms.term_id', 18122)
                ->orWhere('wp_terms.term_id', 16162)
                ->orWhere('wp_terms.term_id', 16163)
                ->orWhere('wp_terms.term_id', 18123)
                ->orWhere('wp_terms.term_id', 16160)
                ->orWhere('wp_terms.term_id', 17136)
                ->orWhere('wp_terms.term_id', 16165)
                ->orWhere('wp_terms.term_id', 16166)
                ->orWhere('wp_terms.term_id', 16369)
                ->orWhere('wp_terms.term_id', 16167)
                ->orWhere('wp_terms.term_id', 16168)
                ->orWhere('wp_terms.term_id', 18125)
                ->orWhere('wp_terms.term_id', 16169)
                ->orWhere('wp_terms.term_id', 18126)
                ->orWhere('wp_terms.term_id', 16159)
                ->orWhere('wp_terms.term_id', 18129)
                ->orWhere('wp_terms.term_id', 16161)
                ->orWhere('wp_terms.term_id', 18130)
                ->orWhere('wp_terms.term_id', 16930)
                ->orWhere('wp_terms.term_id', 16931)
                ->orWhere('wp_terms.term_id', 18138)
                ->orWhere('wp_terms.term_id', 18139)
                ->orWhere('wp_terms.term_id', 18140)
                ->orWhere('wp_terms.term_id', 16932)
                ->orWhere('wp_terms.term_id', 18136)
                ->orWhere('wp_terms.term_id', 18142);
            })
        ->get();

        if($actortypes->isNotEmpty()){
            foreach ($actortypes as $actortype){
                DB::table('indostatistiks')
                    ->where('id_listing', $actortype->id)
                    ->update([
                        'actor_type' => $actortype->name
                    ]);
            }
            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
