<?php 
namespace App\Http\Controllers\Doublons;

use App\Fiche;
use App\Doublon;
use App\Jobs\SearchDoublonsJob;
use App\Http\Controllers\Controller;

class DoublonsController extends Controller {
    
    // Ajax route to dispatch the SearchDoublons
    public function dispatchJob()
    {
        SearchDoublonsJob::dispatch();
        return app('App\Http\Controllers\DashboardController')->index();
    }

    public function index()
    {
        $doublons = Doublon::where('is_not', 0)->where('is_doublons', 0)->with('ficheOne')->with('ficheTwo')->get();
        $title = 'Doublons';
        return view('app.doublons.index', compact('doublons', 'title'));
    }

    // pas doublons
    public function pasDoublons($ficheOne, $ficheTwo)
    {
        Doublon::where('fiche1', $ficheOne)->where('fiche2', $ficheTwo)->update(['is_not' => 1]);
        return $this->index();
    }

    // is doublons
    public function isDoublons($fiche, $doublon)
    {
        Doublon::where('id', $doublon)->update(['is_doublons' => 1]);
        Doublon::where('fiche1', $fiche)->update(['is_not' => 1]);

        Fiche::where('id', $fiche)->delete();

        $doublonsToDeleteFiche1 = Doublon::where('fiche1', $fiche)->get();
        $doublonsToDeleteFiche2 = Doublon::where('fiche2', $fiche)->get();

        foreach ($doublonsToDeleteFiche1 as $d) {
            $d->delete();
        }

        foreach ($doublonsToDeleteFiche2 as $d) {
            $d->delete();
        }
        return $this->index();
    }
}