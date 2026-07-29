<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TargetController extends Controller
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
            ->where('wp_postmeta.meta_key', '_content_field_156')
            ->get();

        //    $no = 1;
        //     foreach ($tanggals as $tanggal) {
        //         echo $no++ . " " . $tanggal->id . "<br>";
        //     }


        if($violences->isNotEmpty()){
            foreach($violences as $violence){
                if($violence->meta_value == 15){
                    $viol = 'Activists';
                }elseif($violence->meta_value == 50){
                    $viol = 'Asset/Site/Resource';
                }elseif($violence->meta_value == 45){
                    $viol = 'Business Entity';
                }elseif($violence->meta_value == 3){
                    $viol = 'Central Government (T)';
                }elseif($violence->meta_value == 14){
                    $viol = 'Child/Youth/Student';
                }elseif($violence->meta_value == 8){
                    $viol = 'Civilian/Local Resident/Individual';
                }elseif($violence->meta_value == 60){
                    $viol = 'Community Group';
                }elseif($violence->meta_value == 52){
                    $viol = 'Foreign Government (T)';
                }elseif($violence->meta_value == 48){
                    $viol = 'Foreign National';
                }elseif($violence->meta_value == 28){
                    $viol = 'Government Security Agency';
                }elseif($violence->meta_value == 19){
                    $viol = 'Hard-line/Radicalized group';
                }elseif($violence->meta_value == 51){
                    $viol = 'Illegal Asset/Site/Resource';
                }elseif($violence->meta_value == 56){
                    $viol = 'Infant';
                }elseif($violence->meta_value == 54){
                    $viol = 'International Activist Group/Organization';
                }elseif($violence->meta_value == 65){
                    $viol = 'Local Criminal/Gang/Group';
                }elseif($violence->meta_value == 9){
                    $viol = 'Local Criminal/Gang/Group2';
                }elseif($violence->meta_value == 1){
                    $viol = 'Local Government (T)';
                }elseif($violence->meta_value == 12){
                    $viol = 'Mass Organization';
                }elseif($violence->meta_value == 11){
                    $viol = 'Motorcycle Gang';
                }elseif($violence->meta_value == 16){
                    $viol = 'NGO';
                }elseif($violence->meta_value == 49){
                    $viol = 'Organized Crime Group';
                }elseif($violence->meta_value == 17){
                    $viol = 'Political Party/ Wing Group';
                }elseif($violence->meta_value == 2){
                    $viol = 'Regional Government';
                }elseif($violence->meta_value == 61){
                    $viol = 'Religious Group';
                }elseif($violence->meta_value == 37){
                    $viol = 'Separatist Group';
                }elseif($violence->meta_value == 42){
                    $viol = 'Terrorist Group';
                }elseif($violence->meta_value == 55){
                    $viol = 'Union/ Labor Group';
                }elseif($violence->meta_value == 10){
                    $viol = 'Vested Interest - Stakeholder';
                }elseif($violence->meta_value == 20){
                    $viol = 'Unconfirmed/Unclear';
                }else{
                    $viol = NULL;
                }
                DB::table('indostatistiknews')
                    ->where('id_listing', $violence->id)
                    ->update([
                        'target' => $viol
                    ]);
            }

            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
