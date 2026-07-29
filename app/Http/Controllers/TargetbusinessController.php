<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TargetbusinessController extends Controller
{
     public function index()
    {
        // ini_set('max_execution_time', 3600);

        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = ['2024-02-01', '2024-02-10'];

        $violences = DB::table('wp_postmeta')
            ->join('wp_posts', 'wp_posts.ID', '=', 'wp_postmeta.post_id')
            ->join('wp_w2gm_locations_relationships', 'wp_w2gm_locations_relationships.post_id', '=', 'wp_postmeta.post_id')
            ->select('wp_postmeta.post_id', 'wp_postmeta.meta_value', 'wp_posts.post_date', 'wp_w2gm_locations_relationships.id')
            ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
            // ->whereBetween(DB::raw('DATE(wp_posts.post_date)'), [$tgl_coba[0], $tgl_coba[1]])
            ->where('wp_postmeta.meta_key', '_content_field_228')
            ->get();

        //    $no = 1;
        //     foreach ($tanggals as $tanggal) {
        //         echo $no++ . " " . $tanggal->id . "<br>";
        //     }


        if($violences->isNotEmpty()){
            foreach($violences as $violence){
               if($violence->meta_value == 1){
                    $viol = 'Country State-owned Enterprise (SOE)';
                }elseif($violence->meta_value == 2){
                    $viol = 'Foreign Business/Enterprise';
                }elseif($violence->meta_value == 3){
                    $viol = 'Large Business/Firm';
                }elseif($violence->meta_value == 4){
                    $viol = 'Multinational Corporation';
                }elseif($violence->meta_value == 5){
                    $viol = 'National Conglomerate';
                }elseif($violence->meta_value == 6){
                    $viol = 'National Conglomerate - Multinational Corporation';
                }elseif($violence->meta_value == 7){
                    $viol = 'Small or Medium Business/Firm';
                }elseif($violence->meta_value == 8){
                    $viol = 'Unconfirmed/Unclear';
                }else{
                    $viol = NULL;
                }
                DB::table('indostatistiknews')
                    ->where('id_listing', $violence->id)
                    ->update([
                        'sub_target' => $viol
                    ]);
            }

            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
