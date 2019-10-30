<?php

namespace App\Services\EspacePartenaire\Http\Controllers;

use App\CR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SendCompteRendu extends Controller
{

  protected $cr;

  public function __construct(CR $cr)
  {
    $this->cr = $cr;
  }

  public function handle(Request $request)
  {
    $partenaire_id = Auth::user()->emailPart->partenaire->id;

    $request->validate([
      'cr' => 'required',
    ]);

    $this->cr->create([
      'cr' => $request->cr,
      'fiche_id' => $request->id,
      'partenaire_id' => $partenaire_id
    ]);

    // Send Event (compte rendu sended)

    // Flash session if every thing ok ;)
    $this->flashSession('Compte Rendu!', 'Enregistré avec success!', 'success');

    // Redirect
    return redirect()->back();
  }

  private function flashSession($title, $message, $type)
  {
    Session::flash('title', $title);
    Session::flash('message', $message);
    Session::flash('type', $type);
  }
}
