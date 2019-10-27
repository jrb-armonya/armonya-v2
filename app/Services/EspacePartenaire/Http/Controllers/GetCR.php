<?php

namespace App\Services\EspacePartenaire\Http\Controllers;

use App\CR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetCR extends Controller
{
  public function last(Request $request)
  {
    return CR::where('fiche_id', $request->fiche_id)
      ->where('partenaire_id', $request->partenaire_id)
      ->orderBy('created_at', 'desc')
      ->first();
  }
}
