<?php

namespace App\Http\Controllers\Factures;

use App\Fiche;
use App\Facture;
use App\Partenaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class FacturesController extends Controller {

    public function __construct() {
        View::share('title', 'Factures');
    }

    public function index() {
        $factures = Facture::all();
        return view('app.factures.index', compact('factures'));
    }

    //return the create form of factures
    public function create(Request $request) {
        $partenaires = Partenaire::all();
        return view('app.factures.create', compact('partenaires'));
    }

    public function show($id) {
        $facture = Facture::find($id);
        $partenaire = Partenaire::find($facture->partenaire_id);
        return view('app.factures.show', compact('facture', 'partenaire'));
    }

    public function store(Request $request) {

        $facture = Facture::create([
            'partenaire_id' => $request->partenaire_id,
            'status'        => 'vide' 
        ]);
        $partenaire = Partenaire::find($request->partenaire_id);
        
        $title = "Facture";
        // return view('app.factures.show', compact('facture', 'partenaire', 'title'));
        return $this->index();
    }

        
        
    //add fiche to facture
    public function addFiche($fiche_id, $facture_id){
        $fiche = Fiche::find($fiche_id);
        $facture = Facture::find($facture_id);
        $fiche->facture_id = $facture->id;
        $fiche->save();

        $facture->status = "En Attente";
        $facture->save();
        return $this->show($facture->id);
    }
    public function deleteFiche($fiche_id, $facture_id){
        $fiche = Fiche::find($fiche_id);
        $facture = Facture::find($facture_id);
        $fiche->facture_id = null;
        $fiche->save();

        if($facture->fiches->count() == 0) {
            $facture->status = "vide";
            $facture->save();
        }
        return $this->show($facture->id);
    }


    //generate a Facture
    public function generate($id) {
        $facture = Facture::find($id);
        return view('app.factures.preview', compact('facture'));
    }
}
