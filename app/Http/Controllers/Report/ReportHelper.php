<?php
namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Fiches\FicheHelper;

class ReportHelper extends Controller
{
    /**
     * Cette class permet de verifier si une action est un report ou pas.
     * et d'jouter a $data l'heure et la date du rappel
    */
    public static function setDateHeureRappel($data) {

        $date_heure = FicheHelper::getDateHeureRappel($data['date_heure_rappel']);
        $data['d_rappel'] = $date_heure['d'];
        $data['h_rappel'] = $date_heure['h'];
        return $data;
    }
}
