<?php

namespace App\Http\Controllers\Fiches;

use App\Fiche;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteFicheRappel extends Controller
{
    /**
     * Delete Fiche Rappel
     * Delete Only a Rappel !!!!!!!!!
     * 
     * @param Request $request
     * @return json
     */
    public function delete(Request $request)
    {
        $fiche = Fiche::find($request->id);
        if($fiche->status_id == 29)
        {
            $fiche->delete();
        }

        return response()->json(200);

    }
}