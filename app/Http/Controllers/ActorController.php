<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActorController extends Controller
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
            ->where('wp_postmeta.meta_key', '_content_field_152')
            ->get();

        //    $no = 1;
        //     foreach ($tanggals as $tanggal) {
        //         echo $no++ . " " . $tanggal->id . "<br>";
        //     }


        if($violences->isNotEmpty()){
            foreach($violences as $violence){
                if($violence->meta_value == 33){
                    $viol = 'Activists';
                }elseif($violence->meta_value == 32){
                    $viol = 'Business Entity';
                }elseif($violence->meta_value == 3){
                    $viol = 'Central Government (A)';
                }elseif($violence->meta_value == 34){
                    $viol = 'Child/Youth/Student';
                }elseif($violence->meta_value == 7){
                    $viol = 'Civilian/Local Resident/Individual';
                }elseif($violence->meta_value == 31){
                    $viol = 'Community Group';
                }elseif($violence->meta_value == 27){
                    $viol = 'Foreign Government (A)';
                }elseif($violence->meta_value == 35){
                    $viol = 'Foreign National';
                }elseif($violence->meta_value == 4){
                    $viol = 'Government Security Agency';
                }elseif($violence->meta_value == 36){
                    $viol = 'Hard-line/Radicalized group';
                }elseif($violence->meta_value == 37){
                    $viol = 'International Activist Group/Organization';
                }elseif($violence->meta_value == 8){
                    $viol = 'Local Criminal/Gang/Group';
                }elseif($violence->meta_value == 38){
                    $viol = 'Local Criminal/Gang/Group2';
                }elseif($violence->meta_value == 1){
                    $viol = 'Local Government (A)';
                }elseif($violence->meta_value == 39){
                    $viol = 'Mass Organization';
                }elseif($violence->meta_value == 40){
                    $viol = 'Motorcycle Gang';
                }elseif($violence->meta_value == 41){
                    $viol = 'NGO';
                }elseif($violence->meta_value == 42){
                    $viol = 'Organized Crime Group';
                }elseif($violence->meta_value == 43){
                    $viol = 'Political Party/ Wing Group';
                }elseif($violence->meta_value == 2){
                    $viol = 'Regional Government';
                }elseif($violence->meta_value == 44){
                    $viol = 'Religious Group';
                }elseif($violence->meta_value == 5){
                    $viol = 'Separatist Group';
                }elseif($violence->meta_value == 6){
                    $viol = 'Terrorist Group';
                }elseif($violence->meta_value == 45){
                    $viol = 'Union/Labor Group';
                }elseif($violence->meta_value == 9){
                    $viol = 'Vested Interest/Stakeholder Group';
                }elseif($violence->meta_value == 20){
                    $viol = 'Unconfirmed/Unclear';
                }elseif($violence->meta_value == 19){
                    $viol = 'Other (A)';
                }else{
                    $viol = NULL;
                }
                DB::table('indostatistiknews')
                    ->where('id_listing', $violence->id)
                    ->update([
                        'actor' => $viol
                    ]);
            }

            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
