<?php
namespace App\Http\Controllers\DataTables;

class CheckSearch
{
    public function checkSearch($search, $result) {

        // dd($result[0]->where('id', 15)->get());
        $posts = $result[0];
        
        $totalData = $result[1];
        // $totalFiltered = $result[1];

        if(!empty($search)) {

            $posts = $posts->filter(function($post) use ($search) {
                return false || stristr($post->id, $search) || stristr($post->prenom, $search);
            });
            
        }

        $totalFiltered = $posts->count();

        return [$posts, $totalData, $totalFiltered];
    }
}