<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TargettypeController extends Controller
{
    public function index()
    {
        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = '2023-06-13';

        $tartypes = DB::table('wp_w2gm_locations_relationships')
                ->join('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_w2gm_locations_relationships.post_id')
                ->join('wp_term_taxonomy', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
                ->join('wp_terms', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
                ->join('wp_posts', 'wp_posts.ID', '=', 'wp_w2gm_locations_relationships.post_id')
                ->select('wp_w2gm_locations_relationships.post_id', 'wp_terms.name')
                ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
                ->where(function($query) {
                    $query->where('wp_terms.term_id', 16448)
                        ->orWhere('wp_terms.term_id', 16252)
                        ->orWhere('wp_terms.term_id', 16253)
                        ->orWhere('wp_terms.term_id', 16254)
                        ->orWhere('wp_terms.term_id', 16259)
                        ->orWhere('wp_terms.term_id', 16272)
                        ->orWhere('wp_terms.term_id', 16257)
                        ->orWhere('wp_terms.term_id', 16314)
                        ->orWhere('wp_terms.term_id', 16263)
                        ->orWhere('wp_terms.term_id', 16260)
                        ->orWhere('wp_terms.term_id', 16261)
                        ->orWhere('wp_terms.term_id', 16262)
                        ->orWhere('wp_terms.term_id', 16267)
                        ->orWhere('wp_terms.term_id', 16264)
                        ->orWhere('wp_terms.term_id', 16265)
                        ->orWhere('wp_terms.term_id', 16266)
                        ->orWhere('wp_terms.term_id', 16271)
                        ->orWhere('wp_terms.term_id', 16268)
                        ->orWhere('wp_terms.term_id', 16269)
                        ->orWhere('wp_terms.term_id', 16270)
                        ->orWhere('wp_terms.term_id', 16275)
                        ->orWhere('wp_terms.term_id', 16256)
                        ->orWhere('wp_terms.term_id', 16273)
                        ->orWhere('wp_terms.term_id', 16274)
                        ->orWhere('wp_terms.term_id', 16279)
                        ->orWhere('wp_terms.term_id', 16276)
                        ->orWhere('wp_terms.term_id', 16277)
                        ->orWhere('wp_terms.term_id', 16278)
                        ->orWhere('wp_terms.term_id', 16283)
                        ->orWhere('wp_terms.term_id', 16280)
                        ->orWhere('wp_terms.term_id', 16281)
                        ->orWhere('wp_terms.term_id', 16282)
                        ->orWhere('wp_terms.term_id', 16287)
                        ->orWhere('wp_terms.term_id', 16284)
                        ->orWhere('wp_terms.term_id', 16285)
                        ->orWhere('wp_terms.term_id', 16286)
                        ->orWhere('wp_terms.term_id', 16291)
                        ->orWhere('wp_terms.term_id', 16288)
                        ->orWhere('wp_terms.term_id', 16289)
                        ->orWhere('wp_terms.term_id', 16290)
                        ->orWhere('wp_terms.term_id', 16295)
                        ->orWhere('wp_terms.term_id', 16292)
                        ->orWhere('wp_terms.term_id', 16293)
                        ->orWhere('wp_terms.term_id', 16294)
                        ->orWhere('wp_terms.term_id', 16299)
                        ->orWhere('wp_terms.term_id', 16296)
                        ->orWhere('wp_terms.term_id', 16297)
                        ->orWhere('wp_terms.term_id', 16298)
                        ->orWhere('wp_terms.term_id', 16303)
                        ->orWhere('wp_terms.term_id', 16300)
                        ->orWhere('wp_terms.term_id', 16301)
                        ->orWhere('wp_terms.term_id', 16302)
                        ->orWhere('wp_terms.term_id', 16307)
                        ->orWhere('wp_terms.term_id', 16304)
                        ->orWhere('wp_terms.term_id', 16305)
                        ->orWhere('wp_terms.term_id', 16306)
                        ->orWhere('wp_terms.term_id', 16311)
                        ->orWhere('wp_terms.term_id', 16308)
                        ->orWhere('wp_terms.term_id', 16309)
                        ->orWhere('wp_terms.term_id', 16310)
                        ->orWhere('wp_terms.term_id', 16315)
                        ->orWhere('wp_terms.term_id', 16312)
                        ->orWhere('wp_terms.term_id', 16313)
                        ->orWhere('wp_terms.term_id', 16319)
                        ->orWhere('wp_terms.term_id', 16316)
                        ->orWhere('wp_terms.term_id', 16317)
                        ->orWhere('wp_terms.term_id', 16318)
                        ->orWhere('wp_terms.term_id', 16323)
                        ->orWhere('wp_terms.term_id', 16320)
                        ->orWhere('wp_terms.term_id', 16321)
                        ->orWhere('wp_terms.term_id', 16322)
                        ->orWhere('wp_terms.term_id', 16327)
                        ->orWhere('wp_terms.term_id', 16324)
                        ->orWhere('wp_terms.term_id', 16325)
                        ->orWhere('wp_terms.term_id', 16326)
                        ->orWhere('wp_terms.term_id', 16445)
                        ->orWhere('wp_terms.term_id', 16446)
                        ->orWhere('wp_terms.term_id', 16447)
                        ->orWhere('wp_terms.term_id', 16331)
                        ->orWhere('wp_terms.term_id', 16328)
                        ->orWhere('wp_terms.term_id', 16329)
                        ->orWhere('wp_terms.term_id', 16330);
                    })
                ->get();

                if($tartypes->isNotEmpty()){
                    foreach ($tartypes as $tartype){
                        DB::table('statistiks')
                            ->where('post_id_cat', $tartype->post_id)
                            ->update([
                                'target_type' => $tartype->name
                            ]);
                    }
                    echo "sukses";
                }else{
                    echo "empty";
                }

    }
}
