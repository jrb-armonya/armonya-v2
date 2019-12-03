<?php

namespace App\Http\Controllers\DataTables;

use App\Fiche;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckDateRange extends Controller {
    
    public function checkDateRange($start, $end, $result) {
        $recordsTotal = $result[1];

        $posts = $result[0];

        $recordsFiltered = $result[2];

        if($start != '') {
            $end == '' ? $end = '2200-12-30' : $end = $end;
            
            $start = Carbon::parse($start);
            $end = Carbon::parse($end);
            
            $posts = $posts->filter(function ($post) use ($start, $end) {
                return (data_get($post, 'd_rv') >= $start) && (data_get($post, 'd_rv') <= $end);
            });
        }

        // $recordsFiltered = $posts->count();
        $recordsFiltered = Fiche::where('created_at', '>=', $start)->where('created_at', '<=', $end)->count();
        return [$posts, $recordsTotal, $recordsFiltered];
    }
}
