<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SocialconflictController extends Controller
{
    public function index()
    {
        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        $tgl_coba = '2024-01-01';

        $sconflicts = DB::table('wp_w2gm_locations_relationships')
            ->join('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_w2gm_locations_relationships.post_id')
            ->join('wp_term_taxonomy', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
            ->join('wp_terms', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
            ->join('wp_posts', 'wp_posts.ID', '=', 'wp_w2gm_locations_relationships.post_id')
            ->select('wp_w2gm_locations_relationships.post_id', 'wp_terms.name')
            ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_coba)
            ->where(function($query) {
                $query->where('wp_terms.term_id', 16200)
                        ->orWhere('wp_terms.term_id', 16203)
                        ->orWhere('wp_terms.term_id', 16204)
                        ->orWhere('wp_terms.term_id', 16197)
                        ->orWhere('wp_terms.term_id', 16205)
                        ->orWhere('wp_terms.term_id', 16199)
                        ->orWhere('wp_terms.term_id', 16194)
                        ->orWhere('wp_terms.term_id', 16196)
                        ->orWhere('wp_terms.term_id', 16202)
                        ->orWhere('wp_terms.term_id', 16206)
                        ->orWhere('wp_terms.term_id', 16198)
                        ->orWhere('wp_terms.term_id', 16195)
                        ->orWhere('wp_terms.term_id', 16201)
                        ->orWhere('wp_terms.term_id', 16751)
                        ->orWhere('wp_terms.term_id', 16754)
                        ->orWhere('wp_terms.term_id', 16752)
                        ->orWhere('wp_terms.term_id', 16750)
                        ->orWhere('wp_terms.term_id', 16753)
                        ->orWhere('wp_terms.term_id', 16749)
                        ->orWhere('wp_terms.term_id', 17034)
                        ->orWhere('wp_terms.term_id', 16758)
                        ->orWhere('wp_terms.term_id', 16756)
                        ->orWhere('wp_terms.term_id', 16757)
                        ->orWhere('wp_terms.term_id', 16755);
                     })
            ->get();

            if($sconflicts->isNotEmpty()){
                foreach ($sconflicts as  $sconflict){
                    DB::table('statistiks')
                        ->where('post_id_cat', $sconflict->post_id)
                        ->update([
                            'social_conflict' => $sconflict->name
                        ]);
                }
                echo "sukses";
            }else{
                echo "empty";
            }

    }
}
