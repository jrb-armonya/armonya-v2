<?php

namespace App\Http\Controllers\Rapports\Synthese;

use App\Fiche;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class SyntheseController extends Controller
{

    public function __construct()
    {
        View::share('title', 'Rapports - Synthese');
    }
    /**
     * Created Today
     * Ecouted Today
     * Ecouted Valid TOday
     * Ecouted noValid Today
     * 
     * Reported Today
     * Reported Created
     * 
     * Confirmed
     * 
     * Sended
     */

    public function get($d = null, $m = null, $y = null)
    {

        $d == null ? $d = date('d') : $d = null;
        $m == null ? $m = date('m') : $d = null;
        $y == null ? $y = date('Y') : $y = null;



        // created today by agent
        $f = new Fiche();
        // Created
        $createdByAgents = $f->prod($d, $m, $y, true)->get();

        // Ecouted month
        $ecouted = $f->ecoutedMonth($m)->whereDay('d_ecoute', $d)->get();

        $ecoutedValid = $ecouted->filter(function ($val, $key) {
            return $val['valid_after_ecoute'] == 1;
        });
        $ecoutedNoValid = $ecouted->filter(function ($val, $key) {
            return $val['no_valid_after_ecoute'] == 1;
        });


        // Report Total
        $reported = $f->reportedMonth($m)->whereDay('d_repo', date('d'))->get();
        $reportCreated = $reported->filter(function ($val, $ekey) {
            return $val['repo_id'] == $val['user_id'];
        });
        // Confirmed
        $confirmed = $f->confirmedToday()->get();

        // Sended
        $sended = $f->sended($m)->whereDay('d_env', $d)->get();

        /**
         * ============================================================
         */


        // rdv demain
        $rdvDemain = Fiche::whereDate('d_rv', Carbon::tomorrow())->get();

        $piDemain = $rdvDemain->filter(function ($val, $key) {
            return $val['status_id'] == 11;
        });
        $hcDemain = $rdvDemain->filter(function ($val, $key) {
            return $val['status_id'] == 12 || $val['status_id'] == 13 || $val['status_id'] == 14 || $val['status_id'] == 15 || $val['status_id'] == 16;
        });
        $nrpDemain = $rdvDemain->filter(function ($val, $key) {
            return $val['status_id'] == 28;
        });
        $reportDemain = $rdvDemain->filter(function ($val, $key) {
            return $val['status_id'] == 3;
        });
        $confDemain = $rdvDemain->filter(function ($val, $key) {
            return $val['d_confirm'] != null && !in_array($val['status_id'], \Config::get('status.noValid'));
        });
        $aConfDemain = $rdvDemain->filter(function ($val, $key) {
            return $val['status_id'] == 4;
        });

        $synthese = [
            'createdByAgents' => $createdByAgents->count(),
            'domicile' => $createdByAgents->where('l_rv', 1)->count(),
            'domicileSemaine' => $createdByAgents->where('l_rv', 4)->count(),
            'ecouted' => $ecouted->count(),
            'ecoutedValid' => $ecoutedValid->count(),
            'ecoutedNoValid' => $ecoutedNoValid->count(),
            'reported' => $reported->count(),
            'reportCreated' => $reportCreated->count(),
            'confirmed' => $confirmed->count(),
            'sended' => $sended->count(),
            'rdv_demain' => $rdvDemain->count(),
            'piDemain' => $piDemain->count(),
            'hcDemain' => $hcDemain->count(),
            'nrpDemain' => $nrpDemain->count(),
            'reportDemain' => $reportDemain->count(),
            'confDemain' => $confDemain->count(),
            'aConfDemain' => $aConfDemain->count(),
            'pourcentageDemain' => round($confDemain->count() * 100 / max($rdvDemain->count(), 1))
        ];
        return view('app.rapports.synthese.index')->with('synthese', $synthese);
    }
}
