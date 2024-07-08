<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TanggalController extends Controller
{
    public function index()
    {
        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = '2024-06-02';

        $tanggals = DB::table('wp_postmeta')
            ->join('wp_posts', 'wp_posts.ID', '=', 'wp_postmeta.post_id')
            ->join('wp_w2gm_locations_relationships', 'wp_w2gm_locations_relationships.post_id', '=', 'wp_postmeta.post_id')
            ->select('wp_postmeta.post_id', 'wp_postmeta.meta_value', 'wp_posts.post_date', 'wp_w2gm_locations_relationships.id')
            ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
            ->where('wp_postmeta.meta_key', '_content_field_89_date_end')
            ->get();

        //    $no = 1;
        //     foreach ($tanggals as $tanggal) {
        //         echo $no++ . " " . $tanggal->id . "<br>";
        //     } 


        if($tanggals->isNotEmpty()){
            foreach($tanggals as $tanggal){
                $tgl_unix = $tanggal->meta_value;
                $tgl_hasil = date('Y-m-d', $tgl_unix);
                DB::table('indostatistiks')
                    ->where('id_listing', $tanggal->id)
                    ->update([
                        'listing_date' => $tgl_hasil
                    ]);
            }

            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
