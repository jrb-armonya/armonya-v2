<?php

namespace App\Services\EspacePartenaire\Http\Controllers;

use App\User;
use App\EmailPart;
use App\Partenaire;
use App\PartenaireEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use App\Services\Factures\Models\Facture;
use App\Http\Controllers\Partenaires\PartenaireHelper;

class EspacePartenaireController extends Controller
{
    public function __construct()
    {
        View::share('title', 'Espace Partenaire');
    }

    

    /**
     * Access to the index Dashboard
     *
     * @return mixed
     */
    public function index()
    {
        return view('espace-partenaire::index');
    }

    public function profile()
    {
        $partenaire = Auth::user()->emailPart->partenaire;
        return view('espace-partenaire::profile.edit')
            ->with('title', 'Profil')
            ->with('partenaire', $partenaire);
    }


    public function updateProfile(Request $request)
    {

        $validatedData = $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',

        ]);


        Auth::user()->update(['password' => Hash::make($request->password)]);

        $this->flashSession('Sécurité', 'Mot de passe modifié avec success!', 'success');
        return redirect()->back();
        
    }

    public function mesRendezVous()
    {
        // Le partenaire ne peut voir la fiche qu'un mois après sa date de rendez-vous.
        // Liste des rendez-vous du partenaire s'envoi a la vue avec un View Composer
        return view('espace-partenaire::rendez-vous.mes-rendez-vous');
    }

    public function factures()
    {
        $partenaire = Auth::user()->emailPart->partenaire;
        $factures = $partenaire->factures;
        return view('espace-partenaire::factures.index')->with('factures', $factures);
    }

    public function facturesShow($id)
    {
        $facture = Facture::find($id);
        return view('espace-partenaire::factures.show')->with('facture', $facture);
    }
}
