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
        
        $tanggals = DB::table('wp_postmeta')
            ->join('wp_posts', 'wp_posts.ID', '=', 'wp_postmeta.post_id')
            ->select('wp_postmeta.post_id', 'wp_postmeta.meta_value', 'wp_posts.post_date') 
            ->whereDate(DB::raw('DATE(wp_posts.post_date)'), '2022-06-13')
            ->where('wp_postmeta.meta_key', '_content_field_89_date_end')
            ->get();
        
        
        if($tanggals->isNotEmpty()){
            foreach($tanggals as $tanggal){
                $tgl_unix = $tanggal->meta_value;
                $tgl_hasil = date('Y-m-d', $tgl_unix);
                DB::table('statistiks')
                    ->where('post_id_cat', $tanggal->post_id)
                    ->update([
                        'listing_date' => $tgl_hasil
                    ]);
            }
        }

        echo "sukses";
    }
}
