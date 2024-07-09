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
        // $tgl_coba = '2024-06-02';

        $tartypes = DB::table('wp_w2gm_locations_relationships')
                ->join('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_w2gm_locations_relationships.post_id')
                ->join('wp_term_taxonomy', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
                ->join('wp_terms', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
                ->join('wp_posts', 'wp_posts.ID', '=', 'wp_w2gm_locations_relationships.post_id')
                ->select('wp_w2gm_locations_relationships.id', 'wp_terms.name')
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
                        ->orWhere('wp_terms.term_id', 16330)
                        ->orWhere('wp_terms.term_id', 16815)
                        ->orWhere('wp_terms.term_id', 16812)
                        ->orWhere('wp_terms.term_id', 16813)
                        ->orWhere('wp_terms.term_id', 16814)
                        ->orWhere('wp_terms.term_id', 16819)
                        ->orWhere('wp_terms.term_id', 16816)
                        ->orWhere('wp_terms.term_id', 16817)
                        ->orWhere('wp_terms.term_id', 16818)
                        ->orWhere('wp_terms.term_id', 16879)
                        ->orWhere('wp_terms.term_id', 16876)
                        ->orWhere('wp_terms.term_id', 16877)
                        ->orWhere('wp_terms.term_id', 16878)
                        ->orWhere('wp_terms.term_id', 16898)
                        ->orWhere('wp_terms.term_id', 16895)
                        ->orWhere('wp_terms.term_id', 16896)
                        ->orWhere('wp_terms.term_id', 16897)
                        ->orWhere('wp_terms.term_id', 16886)
                        ->orWhere('wp_terms.term_id', 16884)
                        ->orWhere('wp_terms.term_id', 16885)
                        ->orWhere('wp_terms.term_id', 17051)
                        ->orWhere('wp_terms.term_id', 16823)
                        ->orWhere('wp_terms.term_id', 16820)
                        ->orWhere('wp_terms.term_id', 16821)
                        ->orWhere('wp_terms.term_id', 16822)
                        ->orWhere('wp_terms.term_id', 16835)
                        ->orWhere('wp_terms.term_id', 16832)
                        ->orWhere('wp_terms.term_id', 16833)
                        ->orWhere('wp_terms.term_id', 16834)
                        ->orWhere('wp_terms.term_id', 16827)
                        ->orWhere('wp_terms.term_id', 16824)
                        ->orWhere('wp_terms.term_id', 16825)
                        ->orWhere('wp_terms.term_id', 16826)
                        ->orWhere('wp_terms.term_id', 16890)
                        ->orWhere('wp_terms.term_id', 16887)
                        ->orWhere('wp_terms.term_id', 16888)
                        ->orWhere('wp_terms.term_id', 16889)
                        ->orWhere('wp_terms.term_id', 16871)
                        ->orWhere('wp_terms.term_id', 16868)
                        ->orWhere('wp_terms.term_id', 16869)
                        ->orWhere('wp_terms.term_id', 16870)
                        ->orWhere('wp_terms.term_id', 16839)
                        ->orWhere('wp_terms.term_id', 16836)
                        ->orWhere('wp_terms.term_id', 16837)
                        ->orWhere('wp_terms.term_id', 16838)
                        ->orWhere('wp_terms.term_id', 16831)
                        ->orWhere('wp_terms.term_id', 16828)
                        ->orWhere('wp_terms.term_id', 16829)
                        ->orWhere('wp_terms.term_id', 16830)
                        ->orWhere('wp_terms.term_id', 16894)
                        ->orWhere('wp_terms.term_id', 16891)
                        ->orWhere('wp_terms.term_id', 16892)
                        ->orWhere('wp_terms.term_id', 16893)
                        ->orWhere('wp_terms.term_id', 16875)
                        ->orWhere('wp_terms.term_id', 16872)
                        ->orWhere('wp_terms.term_id', 16873)
                        ->orWhere('wp_terms.term_id', 16874)
                        ->orWhere('wp_terms.term_id', 16867)
                        ->orWhere('wp_terms.term_id', 16864)
                        ->orWhere('wp_terms.term_id', 16865)
                        ->orWhere('wp_terms.term_id', 16866)
                        ->orWhere('wp_terms.term_id', 16902)
                        ->orWhere('wp_terms.term_id', 16899)
                        ->orWhere('wp_terms.term_id', 16900)
                        ->orWhere('wp_terms.term_id', 16901)
                        ->orWhere('wp_terms.term_id', 16843)
                        ->orWhere('wp_terms.term_id', 16840)
                        ->orWhere('wp_terms.term_id', 16841)
                        ->orWhere('wp_terms.term_id', 16842)
                        ->orWhere('wp_terms.term_id', 16847)
                        ->orWhere('wp_terms.term_id', 16844)
                        ->orWhere('wp_terms.term_id', 16845)
                        ->orWhere('wp_terms.term_id', 16846)
                        ->orWhere('wp_terms.term_id', 16851)
                        ->orWhere('wp_terms.term_id', 16848)
                        ->orWhere('wp_terms.term_id', 16849)
                        ->orWhere('wp_terms.term_id', 16850)
                        ->orWhere('wp_terms.term_id', 16855)
                        ->orWhere('wp_terms.term_id', 16852)
                        ->orWhere('wp_terms.term_id', 16853)
                        ->orWhere('wp_terms.term_id', 16854)
                        ->orWhere('wp_terms.term_id', 16859)
                        ->orWhere('wp_terms.term_id', 16856)
                        ->orWhere('wp_terms.term_id', 16857)
                        ->orWhere('wp_terms.term_id', 16858)
                        ->orWhere('wp_terms.term_id', 16883)
                        ->orWhere('wp_terms.term_id', 16880)
                        ->orWhere('wp_terms.term_id', 16881)
                        ->orWhere('wp_terms.term_id', 16882)
                        ->orWhere('wp_terms.term_id', 16863)
                        ->orWhere('wp_terms.term_id', 16860)
                        ->orWhere('wp_terms.term_id', 16861)
                        ->orWhere('wp_terms.term_id', 16862)
                        ->orWhere('wp_terms.term_id', 16958)
                        ->orWhere('wp_terms.term_id', 16955)
                        ->orWhere('wp_terms.term_id', 16956)
                        ->orWhere('wp_terms.term_id', 16957)
                        ->orWhere('wp_terms.term_id', 16963)
                        ->orWhere('wp_terms.term_id', 16960)
                        ->orWhere('wp_terms.term_id', 16961)
                        ->orWhere('wp_terms.term_id', 16962)
                        ->orWhere('wp_terms.term_id', 16947)
                        ->orWhere('wp_terms.term_id', 16944)
                        ->orWhere('wp_terms.term_id', 16945)
                        ->orWhere('wp_terms.term_id', 16946)
                        ->orWhere('wp_terms.term_id', 16943)
                        ->orWhere('wp_terms.term_id', 16940)
                        ->orWhere('wp_terms.term_id', 16941)
                        ->orWhere('wp_terms.term_id', 16942)
                        ->orWhere('wp_terms.term_id', 16939)
                        ->orWhere('wp_terms.term_id', 16936)
                        ->orWhere('wp_terms.term_id', 16937)
                        ->orWhere('wp_terms.term_id', 16938)
                        ->orWhere('wp_terms.term_id', 16974)
                        ->orWhere('wp_terms.term_id', 16971)
                        ->orWhere('wp_terms.term_id', 16972)
                        ->orWhere('wp_terms.term_id', 16973)
                        ->orWhere('wp_terms.term_id', 16970)
                        ->orWhere('wp_terms.term_id', 16967)
                        ->orWhere('wp_terms.term_id', 16968)
                        ->orWhere('wp_terms.term_id', 16969)
                        ->orWhere('wp_terms.term_id', 17790)
                        ->orWhere('wp_terms.term_id', 17791)
                        ->orWhere('wp_terms.term_id', 17792)
                        ->orWhere('wp_terms.term_id', 17793)
                        ->orWhere('wp_terms.term_id', 18170)
                        ->orWhere('wp_terms.term_id', 18171)
                        ->orWhere('wp_terms.term_id', 18172)
                        ->orWhere('wp_terms.term_id', 18173)
                        ->orWhere('wp_terms.term_id', 18174)
                        ->orWhere('wp_terms.term_id', 18175)
                        ->orWhere('wp_terms.term_id', 18176)
                        ->orWhere('wp_terms.term_id', 18177)
                        ->orWhere('wp_terms.term_id', 18178)
                        ->orWhere('wp_terms.term_id', 18179)
                        ->orWhere('wp_terms.term_id', 18180)
                        ->orWhere('wp_terms.term_id', 18181)
                        ->orWhere('wp_terms.term_id', 18182)
                        ->orWhere('wp_terms.term_id', 18183)
                        ->orWhere('wp_terms.term_id', 18184)
                        ->orWhere('wp_terms.term_id', 18185)
                        ->orWhere('wp_terms.term_id', 18186)
                        ->orWhere('wp_terms.term_id', 18187)
                        ->orWhere('wp_terms.term_id', 18188)
                        ->orWhere('wp_terms.term_id', 18189)
                        ->orWhere('wp_terms.term_id', 18190)
                        ->orWhere('wp_terms.term_id', 18191)
                        ->orWhere('wp_terms.term_id', 18192)
                        ->orWhere('wp_terms.term_id', 18193)
                        ->orWhere('wp_terms.term_id', 18194)
                        ->orWhere('wp_terms.term_id', 18195)
                        ->orWhere('wp_terms.term_id', 18196)
                        ->orWhere('wp_terms.term_id', 18197)
                        ->orWhere('wp_terms.term_id', 18198)
                        ->orWhere('wp_terms.term_id', 18199)
                        ->orWhere('wp_terms.term_id', 18200)
                        ->orWhere('wp_terms.term_id', 18201)
                        ->orWhere('wp_terms.term_id', 18202)
                        ->orWhere('wp_terms.term_id', 18203)
                        ->orWhere('wp_terms.term_id', 18204)
                        ->orWhere('wp_terms.term_id', 18205)
                        ->orWhere('wp_terms.term_id', 18206)
                        ->orWhere('wp_terms.term_id', 18207)
                        ->orWhere('wp_terms.term_id', 18208)
                        ->orWhere('wp_terms.term_id', 18209)
                        ->orWhere('wp_terms.term_id', 18210)
                        ->orWhere('wp_terms.term_id', 18211)
                        ->orWhere('wp_terms.term_id', 18212)
                        ->orWhere('wp_terms.term_id', 18213)
                        ->orWhere('wp_terms.term_id', 18214)
                        ->orWhere('wp_terms.term_id', 18215)
                        ->orWhere('wp_terms.term_id', 18216)
                        ->orWhere('wp_terms.term_id', 18217)
                        ->orWhere('wp_terms.term_id', 18132)
                        ->orWhere('wp_terms.term_id', 18133)
                        ->orWhere('wp_terms.term_id', 18134)
                        ->orWhere('wp_terms.term_id', 18135)
                        ->orWhere('wp_terms.term_id', 18246)
                        ->orWhere('wp_terms.term_id', 18247)
                        ->orWhere('wp_terms.term_id', 18248)
                        ->orWhere('wp_terms.term_id', 18249)
                        ->orWhere('wp_terms.term_id', 18250)
                        ->orWhere('wp_terms.term_id', 18251)
                        ->orWhere('wp_terms.term_id', 18252)
                        ->orWhere('wp_terms.term_id', 18253)
                        ->orWhere('wp_terms.term_id', 18254)
                        ->orWhere('wp_terms.term_id', 18255) 
                        ->orWhere('wp_terms.term_id', 18256)
                        ->orWhere('wp_terms.term_id', 18257)
                        ->orWhere('wp_terms.term_id', 18258)
                        ->orWhere('wp_terms.term_id', 18259)
                        ->orWhere('wp_terms.term_id', 18260)
                        ->orWhere('wp_terms.term_id', 18261)
                        ->orWhere('wp_terms.term_id', 18262)
                        ->orWhere('wp_terms.term_id', 18263)
                        ->orWhere('wp_terms.term_id', 18264)
                        ->orWhere('wp_terms.term_id', 18265)
                        ->orWhere('wp_terms.term_id', 18266)
                        ->orWhere('wp_terms.term_id', 18267)
                        ->orWhere('wp_terms.term_id', 18268)
                        ->orWhere('wp_terms.term_id', 18269)
                        ->orWhere('wp_terms.term_id', 18270)
                        ->orWhere('wp_terms.term_id', 18271)
                        ->orWhere('wp_terms.term_id', 18272)
                        ->orWhere('wp_terms.term_id', 18273)
                        ->orWhere('wp_terms.term_id', 18274)
                        ->orWhere('wp_terms.term_id', 18275)
                        ->orWhere('wp_terms.term_id', 18276)
                        ->orWhere('wp_terms.term_id', 18277)
                        ->orWhere('wp_terms.term_id', 18278)
                        ->orWhere('wp_terms.term_id', 18279)
                        ->orWhere('wp_terms.term_id', 18280)
                        ->orWhere('wp_terms.term_id', 18281); 
                    })
                ->get();

                if($tartypes->isNotEmpty()){
                    foreach ($tartypes as $tartype){
                        DB::table('indostatistiks')
                            ->where('id_listing', $tartype->id)
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
