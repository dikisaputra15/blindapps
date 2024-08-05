<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExplosivetypeController extends Controller
{
    public function index()
    {
        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = '2024-06-02';

        $explosivetypes = DB::table('wp_w2gm_locations_relationships')
        ->join('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_w2gm_locations_relationships.post_id')
        ->join('wp_term_taxonomy', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
        ->join('wp_terms', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
        ->join('wp_posts', 'wp_posts.ID', '=', 'wp_w2gm_locations_relationships.post_id')
        ->select('wp_w2gm_locations_relationships.id', 'wp_terms.name')
        ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
        ->where(function($query) {
            $query->Where('wp_terms.term_id', 16395)
                ->orWhere('wp_terms.term_id', 16392)
                ->orWhere('wp_terms.term_id', 16391)
                ->orWhere('wp_terms.term_id', 16146)
                ->orWhere('wp_terms.term_id', 16399)
                ->orWhere('wp_terms.term_id', 16396)
                ->orWhere('wp_terms.term_id', 16142)
                ->orWhere('wp_terms.term_id', 16782)
                ->orWhere('wp_terms.term_id', 16144)
                ->orWhere('wp_terms.term_id', 16783)
                ->orWhere('wp_terms.term_id', 16397)
                ->orWhere('wp_terms.term_id', 16145)
                ->orWhere('wp_terms.term_id', 16393)
                ->orWhere('wp_terms.term_id', 16394);
            })
        ->get();

        if($explosivetypes->isNotEmpty()){
            foreach ($explosivetypes as  $explosivetype){
                DB::table('indostatistiknews')
                    ->where('id_listing', $explosivetype->id)
                    ->update([
                        'explosive_type' => $explosivetype->name
                    ]);
            }
            echo "sukses";
        }else{
            echo "empty";
        }
    }
}
