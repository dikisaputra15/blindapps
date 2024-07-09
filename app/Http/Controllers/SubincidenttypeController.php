<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubincidenttypeController extends Controller
{
    public function index()
    {
        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = '2024-06-02';
        $sutypes = DB::table('wp_w2gm_locations_relationships')
            ->join('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_w2gm_locations_relationships.post_id')
            ->join('wp_term_taxonomy', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
            ->join('wp_terms', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
            ->join('wp_posts', 'wp_posts.ID', '=', 'wp_w2gm_locations_relationships.post_id')
            ->select('wp_w2gm_locations_relationships.id', 'wp_terms.name', 'wp_posts.post_date')
            ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
            ->where(function($query) {
                $query->where('wp_terms.term_id', 6827)
                        ->orwhere('wp_terms.term_id', 6828)
                        ->orwhere('wp_terms.term_id', 16117)
                        ->orwhere('wp_terms.term_id', 6826)
                        ->orwhere('wp_terms.term_id', 16332)
                        ->orwhere('wp_terms.term_id', 16121)
                        ->orwhere('wp_terms.term_id', 16123)
                        ->orwhere('wp_terms.term_id', 16125)
                        ->orwhere('wp_terms.term_id', 16122)
                        ->orwhere('wp_terms.term_id', 16119)
                        ->orwhere('wp_terms.term_id', 16120)
                        ->orwhere('wp_terms.term_id', 16124)
                        ->orwhere('wp_terms.term_id', 16147)
                        ->orwhere('wp_terms.term_id', 16741)
                        ->orwhere('wp_terms.term_id', 485)
                        ->orwhere('wp_terms.term_id', 16251)
                        ->orwhere('wp_terms.term_id', 451)
                        ->orwhere('wp_terms.term_id', 16250)
                        ->orwhere('wp_terms.term_id', 487)
                        ->orwhere('wp_terms.term_id', 486)
                        ->orwhere('wp_terms.term_id', 453)
                        ->orwhere('wp_terms.term_id', 452)
                        ->orwhere('wp_terms.term_id', 458)
                        ->orwhere('wp_terms.term_id', 7196)
                        ->orwhere('wp_terms.term_id', 466)
                        ->orwhere('wp_terms.term_id', 16191)
                        ->orwhere('wp_terms.term_id', 16742)
                        ->orwhere('wp_terms.term_id', 16743)
                        ->orwhere('wp_terms.term_id', 16744)
                        ->orwhere('wp_terms.term_id', 16745)
                        ->orwhere('wp_terms.term_id', 16746)
                        ->orwhere('wp_terms.term_id', 16747)
                        ->orwhere('wp_terms.term_id', 16748)
                        ->orwhere('wp_terms.term_id', 461)
                        ->orwhere('wp_terms.term_id', 460)
                        ->orwhere('wp_terms.term_id', 16207)
                        ->orwhere('wp_terms.term_id', 463)
                        ->orwhere('wp_terms.term_id', 467)
                        ->orwhere('wp_terms.term_id', 464)
                        ->orwhere('wp_terms.term_id', 459)
                        ->orwhere('wp_terms.term_id', 5418)
                        ->orwhere('wp_terms.term_id', 16192)
                        ->orwhere('wp_terms.term_id', 462)
                        ->orwhere('wp_terms.term_id', 16193)
                        ->orwhere('wp_terms.term_id', 16770)
                        ->orwhere('wp_terms.term_id', 16771)
                        ->orwhere('wp_terms.term_id', 16772)
                        ->orwhere('wp_terms.term_id', 16773)
                        ->orwhere('wp_terms.term_id', 16776)
                        ->orwhere('wp_terms.term_id', 16777)
                        ->orwhere('wp_terms.term_id', 16778)
                        ->orwhere('wp_terms.term_id', 16779)
                        ->orwhere('wp_terms.term_id', 16780)
                        ->orwhere('wp_terms.term_id', 16781)
                        ->orwhere('wp_terms.term_id', 465)
                        ->orwhere('wp_terms.term_id', 679)
                        ->orwhere('wp_terms.term_id', 16190)
                        ->orwhere('wp_terms.term_id', 16189)
                        ->orwhere('wp_terms.term_id', 481)
                        ->orwhere('wp_terms.term_id', 7347)
                        ->orwhere('wp_terms.term_id', 16240)
                        ->orwhere('wp_terms.term_id', 484)
                        ->orwhere('wp_terms.term_id', 5868)
                        ->orwhere('wp_terms.term_id', 16246)
                        ->orwhere('wp_terms.term_id', 16248)
                        ->orwhere('wp_terms.term_id', 16242)
                        ->orwhere('wp_terms.term_id', 16243)
                        ->orwhere('wp_terms.term_id', 482)
                        ->orwhere('wp_terms.term_id', 483)
                        ->orwhere('wp_terms.term_id', 16244)
                        ->orwhere('wp_terms.term_id', 16247)
                        ->orwhere('wp_terms.term_id', 16245)
                        ->orwhere('wp_terms.term_id', 8139)
                        ->orwhere('wp_terms.term_id', 16241)
                        ->orwhere('wp_terms.term_id', 447)
                        ->orwhere('wp_terms.term_id', 16234)
                        ->orwhere('wp_terms.term_id', 16230)
                        ->orwhere('wp_terms.term_id', 478)
                        ->orwhere('wp_terms.term_id', 5869)
                        ->orwhere('wp_terms.term_id', 16238)
                        ->orwhere('wp_terms.term_id', 16231)
                        ->orwhere('wp_terms.term_id', 16233)
                        ->orwhere('wp_terms.term_id', 16235)
                        ->orwhere('wp_terms.term_id', 448)
                        ->orwhere('wp_terms.term_id', 449)
                        ->orwhere('wp_terms.term_id', 16236)
                        ->orwhere('wp_terms.term_id', 16239)
                        ->orwhere('wp_terms.term_id', 16237)
                        ->orwhere('wp_terms.term_id', 16249)
                        ->orwhere('wp_terms.term_id', 16232)
                        ->orwhere('wp_terms.term_id', 16948)
                        ->orwhere('wp_terms.term_id', 17723)
                        ->orwhere('wp_terms.term_id', 17724)
                        ->orwhere('wp_terms.term_id', 17725)
                        ->orwhere('wp_terms.term_id', 18081)
                        ->orwhere('wp_terms.term_id', 18082)
                        ->orwhere('wp_terms.term_id', 18083)
                        ->orwhere('wp_terms.term_id', 18084)
                        ->orwhere('wp_terms.term_id', 18085)
                        ->orwhere('wp_terms.term_id', 18086)
                        ->orwhere('wp_terms.term_id', 18087)
                        ->orwhere('wp_terms.term_id', 18095)
                        ->orwhere('wp_terms.term_id', 18096);
            })
            ->get();

        if($sutypes->isNotEmpty()){
                foreach ($sutypes as $sutype){
                    DB::table('indostatistiks')
                        ->where('id_listing', $sutype->id)
                        ->update([
                            'sub_incident_type' => $sutype->name
                        ]);
                }
                echo "sukses";
        }else{
            echo "empty";
        }

    }
}
