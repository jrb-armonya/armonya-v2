<?php
namespace App\Http\Controllers\Fiches;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FicheHelper extends Controller
{
    /**
     * getDateHeure
     * get only the date from the string 'd_rv'
     * @param mixed $request
     * @return void
     */
    public static function getDateHeure($request)
    {
        $date = explode('/', substr($request, 0, 10));
        $day = $date[0];
        $month = $date[1];
        $year = $date[2];
        // $heure = substr($request, 13, 5);
        $response['d'] = Carbon::create($year, $month, $day, 0, 0, 0,  'Europe/Paris')->format('Y-m-d');
        // $response['h'] = $heure;
        return $response;
    }

    /**
     * getDateHeureRappel
     * get the date and heure from the date_heure_rappel string
     * @param mixed $request
     * @return void
     */
    public static function getDateHeureRappel($request)
    {
        $date = explode('/', substr($request, 0, 10));
        $day = $date[0];
        $month = $date[1];
        $year = $date[2];
        $heure = substr($request, 13, 5);
        $response['d'] = Carbon::create($year, $month, $day, 0, 0, 0,  'Europe/Paris')->format('Y-m-d');
        $response['h'] = $heure;
        return $response;
    }

    public static function formatData($request, $data, $date_rendez_vous)
    {
        //date et heure rendez-vous
        $data['d_rv'] = $date_rendez_vous['d'];
        $data['h_rv'] = $request->heure_rendez_vous;

        // specifique values
        $data['tel_fix'] = $request->tel_fix;

        //Locataire
        if( $request->locataire == 0 )
        {
            $data['locataire'] = 1;
            $data['proprietaire'] = 0;
            $data['gratuit'] = 0;
        }
        if( $request->locataire == 1 ){
            $data['proprietaire'] = 1;
            $data['locataire'] = 0;
            $data['gratuit'] = 0;
        }
        if( $request->locataire == 2 ){
            $data['proprietaire'] = 0;
            $data['locataire'] = 0;
            $data['gratuit'] = 1;
        }

        //cgp
        $request->cgp === "on" ? $data['cgp'] = 1 : $data['cgp'] = 0;
        
        //sms_conf, sms_prise
        if ($request->sms_conf == 0 )
            $data['sms_conf'] = $data['sms_prise'] = 0;
        elseif ($request->sms_conf == 1 )
        {
            $data['sms_prise'] = 1;        
            $data['sms_conf'] = 0;
        }
        elseif ($request->sms_conf == 2)
        {
            $data['sms_prise'] = 0;        
            $data['sms_conf'] = 1;
        }
        return $data;
    }

}
