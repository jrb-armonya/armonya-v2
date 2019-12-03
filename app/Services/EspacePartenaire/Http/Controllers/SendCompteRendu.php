<?php

namespace App\Services\EspacePartenaire\Http\Controllers;

use App\CR;
use App\User;
use App\Fiche;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PartenaireSendCRNotification;

class SendCompteRendu extends Controller
{

  protected $cr;

  public function __construct(CR $cr)
  {
    $this->cr = $cr;
  }

  public function handle(Request $request)
  {
    $partenaire = Auth::user()->emailPart->partenaire;

    $fiche = Fiche::where('id', $request->id)->first();

    $partenaire_id = $partenaire->id;

    $request->validate([
      'cr' => 'required',
    ]);


    $cr = $this->cr->create([
      'cr' => $request->cr,
      'fiche_id' => $fiche->id,
      'partenaire_id' => $partenaire_id,
      'from_armonya' => 0,
      'state' => $request->state
    ]);

    // Send Event (compte rendu sended)
    $usersNotifiable = User::whereIn('role_id', [1, 9])->get();
    foreach($usersNotifiable as $user)
    {
      Notification::send($user, new PartenaireSendCRNotification($fiche, $partenaire, $cr->cr, $user, $cr->state));
    }

    // Send the fiche to ciblé or to Controle Qualité
    if($cr->state == 'Ciblé') {
      $fiche->status_id = 10;
      $fiche->save();
    } else {
      $fiche->status_id = 8;
      $fiche->save();
    }

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
