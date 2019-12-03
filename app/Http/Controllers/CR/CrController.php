<?php

namespace App\Http\Controllers\CR;

use App\CR;
use App\Fiche;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CrController extends Controller
{

    public function armonyaAddCr(Request $request, CR $cr)
    {

        $fiche = Fiche::with('partenaire')->where('id', $request->fiche_id)->first();

        $cr->cr = $request->cr_msg;
        $cr->fiche_id = $fiche->id;
        $cr->partenaire_id = $fiche->partenaire->id;
        $cr->from_armonya = 1;
        $cr->user_id = Auth::user()->id;

        $cr->save();

        return redirect()->back();
    }
}
