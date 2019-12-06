<?php

namespace App\Http\Controllers\Historique;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Fiche;

class HistoriqueController extends Controller
{   
    //get the historique of a fiche
    public function fiche($id) {
        $fiche = Fiche::find($id);
        $title = "Historique";
        return view('app.historique.fiche', compact('fiche', 'title'));
    }
}
