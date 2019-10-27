<?php

namespace App\Services\EspacePartenaire\Http\Controllers;

use App\User;
use App\EmailPart;
use App\Partenaire;
use App\PartenaireEmail;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Partenaires\PartenaireHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use App\Services\Factures\Models\Facture;

class EspacePartenaireController extends Controller
{
    public function __construct()
    {
        View::share('title', 'Espace Partenaire');
    }

    // Create a new espace partenaire

    public function create($id)
    {
        $email = PartenaireEmail::find($id);

        $partenaire = $email->partenaire;

        $password = Str::random(8);

        $user = User::create([
            'name'      => explode("@", $email->email)[0],
            'email'     => $email->email,
            'fictif'     => null,
            'password'  => Hash::make($password),
            'role_id'   => 10
        ]);


        $email->update(['user_id' => $user->id]);

        // Send the email-confirmation to the email partenaire
        $helper = new PartenaireHelper();
        $helper->sendEmaiLConfirmationEspacePartenaire($partenaire->id, $email->id, $password);

        return redirect()->back();
    }

    public function index()
    {
        $partenaire = Auth::user()->partenaire()->first();
        return view('espace-partenaire::index')
            ->with('title', 'Espace Partenaire')
            ->with('partenaire', $partenaire);
    }

    public function profile()
    {
        $partenaire = Auth::user()->partenaire()->first();
        return view('espace-partenaire::profile.edit')
            ->with('title', 'Profil')
            ->with('partenaire', $partenaire);
    }

    public function mesRendezVous()
    {
        $partenaire = Auth::user()->partenaire()->first();
        $fiches = $partenaire->fiches;
        return view('espace-partenaire::rendez-vous.mes-rendez-vous')->with('fiches', $fiches);
    }

    public function factures()
    {
        $partenaire = Auth::user()->partenaire()->first();
        $factures = $partenaire->factures;
        return view('espace-partenaire::factures.index')->with('factures', $factures);
    }

    public function facturesShow($id)
    {
        $facture = Facture::find($id);
        return view('espace-partenaire::factures.show')->with('facture', $facture);
    }
}
