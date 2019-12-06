<?php
namespace App\Http\Controllers\Search;

use App\Fiche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController {


    public function get(Request $request) {
        $chars = " ";
        if(!empty($request->term)) {
            $search = $request->term;
            $searchPhone = str_replace(' ', '', $search);
            $result = Fiche::where(function($q) use ($search, $searchPhone, $chars){
                $q->where("id", "like",  "%{$search}%")
                    ->orWhere("name", "like",  "%{$search}%")
                    ->orWhere("prenom", "like",  "%{$search}%")
                    ->orWhere("cp", "like",  "%{$search}%")
                    // ->orWhere("tel_fix", "like",  "%{$searchPhone}%")
                    // ->orWhere("tel_mobile", "like",  "%{$searchPhone}%")
                    // ->orWhere("tel_bureau", "like",  "%{$searchPhone}%")
                    ->orWhere(DB::raw("REPLACE(tel_mobile, '$chars', '')"), "LIKE", "%{$searchPhone}%")
                    ->orWhere(DB::raw("REPLACE(tel_fix, '$chars', '')"), "LIKE", "%{$searchPhone}%")
                    ->orWhere(DB::raw("REPLACE(tel_bureau, '$chars', '')"), "LIKE", "%{$searchPhone}%");
            })->with('user')->with('status')->get();

            return $result;
        }

        
    }
}