<?php

namespace App\Services\EspacePartenaire\Http\Composer;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class CurrentPartenaireComposer
{

    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        // $this->users = $users;
    }

    public function compose(View $view)
    {


        // $now = \Carbon\Carbon::today();
        // $nowSubMonth = \Carbon\Carbon::today()->subMonth();

       if(Auth::user()->emailPart){

            $partenaire = Auth::user()->emailPart->partenaire; 

            $fiches = $partenaire->fiches()->where(function($q){
                $q->whereMonth('d_rv', '=', date('m'))->whereYear('d_rv', '=' , date('Y'))->whereIn('status_id', [7, 8, 10]);
                // $q->orWhereBetween('d_rv', [$nowSubMonth, $now]);
            })->get(); 

            $crs = $fiches->filter(function($value, $key){
                return  $value->crs->isEmpty();
            })->count();
            
     
            $view->with('crs', $crs);
     
            $view->with('fiches', $fiches);
          
            $view->with('partenaire', $partenaire);
       };


    }
}