<?php

namespace App\Http\Controllers\Fiches;

use App\Historic;
use App\Export\Export;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoricFiche extends Controller
{
    static public function saveInit($fiche, $action)
    {
        $data = \array_merge(
            ['fiche_id' => $fiche->id, 'action_id' => $action->id], 
            $fiche->toArray()
        );
        $historic = new Historic();
        $historic->create($data);
    }

    public function getFirstDetails($id)
    {
        $data = Historic::where('fiche_id', $id)->first();
        if($data){
            return view('layouts.pdf.fiche', compact('data'));
        }
        else return view('layouts.pdf.errors.historicDetails')->with('title', 'Erreur');
    }

    public function getDetails($action_id)
    {
        $data = Historic::where('action_id', $action_id)->first();
        if($data){
            return view('layouts.pdf.fiche', compact('data'));
        }
        else return view('layouts.pdf.errors.historicDetails')->with('title', 'Erreur');
    }
}
