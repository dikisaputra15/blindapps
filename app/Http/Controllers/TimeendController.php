<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TimeendController extends Controller
{
    public function index()
    {
        // ini_set('max_execution_time', 3600);

        $tgl_now = Carbon::now()->format('Y-m-d');

        $violences = DB::table('wp_postmeta')
            ->join('wp_posts', 'wp_posts.ID', '=', 'wp_postmeta.post_id')
            ->join('wp_w2gm_locations_relationships', 'wp_w2gm_locations_relationships.post_id', '=', 'wp_postmeta.post_id')
            ->select(
                'wp_postmeta.post_id',
                'wp_postmeta.meta_key',
                'wp_postmeta.meta_value',
                'wp_posts.post_date',
                'wp_w2gm_locations_relationships.id as listing_id'
            )
            ->whereDate('wp_posts.post_date', $tgl_now)
            ->whereIn('wp_postmeta.meta_key', [
                '_content_field_210', // Hour
                '_content_field_211'  // Minute
            ])
            ->get()
            ->groupBy('post_id');

        if ($violences->isEmpty()) {
            echo "empty";
            return;
        }

        foreach ($violences as $postId => $items) {

            $hour = null;
            $minute = null;
            $listingId = null;

            foreach ($items as $item) {

                $listingId = $item->listing_id;

                if ($item->meta_key == '_content_field_210') {

                    if ($item->meta_value >= 1 && $item->meta_value <= 24) {
                        $hour = str_pad(
                            ((int)$item->meta_value) - 1,
                            2,
                            '0',
                            STR_PAD_LEFT
                        );
                    }

                } elseif ($item->meta_key == '_content_field_211') {

                    if ($item->meta_value >= 1 && $item->meta_value <= 60) {
                        $minute = str_pad(
                            ((int)$item->meta_value) - 1,
                            2,
                            '0',
                            STR_PAD_LEFT
                        );
                    }
                }
            }

            // jika hour dan minute ditemukan
            if ($hour !== null && $minute !== null) {

                $timeIncidentEnd = $hour . ':' . $minute;

                DB::table('indostatistiknews')
                    ->where('id_listing', $listingId)
                    ->update([
                        'time_incident_end' => $timeIncidentEnd
                    ]);

            }
        }

        echo "sukses";
    }
}
