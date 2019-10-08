<?php

namespace App\Services\Factures\Http\Controllers;

use App\Partenaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Factures\Models\Facture;
use App\Services\Factures\Http\Controllers\FacturesController;

class CreateFacture extends Controller{

    protected $facture;

    /**
     * __consctruct
     *
     * @param FactureReposiroty $facture
     * @return void
     */
    public function __consctruct(Facture $facture)
    {
        $this->facture = $facture;
    }

    /**
     * create
     *
     * @param mixed $attributes
     * @return void
     */
    public function createOrFind(Request $request)
    {
        // get the partenaire
        $partenaire = Partenaire::find($request->partenaire_id);
        
        // if the partenaire has a Facture find() and go to show

        if($partenaire->factureVide()->first()) {
            $facture = $partenaire->factureVide()->first();
        }
        // else create new Facture
        else {
            $facture = new Facture();
            $facture->partenaire_id = $partenaire->id;
            $facture->status = "vide";
            $facture->save();
            $facture->uiid = 'F' . date('Y') . '-'.$facture->id;
            $facture->save();
        }
        $facturesController = new FacturesController();
        return  $facturesController->show($facture->id);

    }

}
