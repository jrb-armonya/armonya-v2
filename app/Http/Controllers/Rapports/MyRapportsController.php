<?php

namespace App\Http\Controllers\Rapports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Fiche;

class MyRapportsController extends Controller
{
    // return fiches createdToday / Valid / no VALID (TODAY)
    public function getMyCreatedToday()
    {
        return Auth::user()->fiches()->whereDate('created_at', \Carbon\Carbon::today())->get();
    }
    public function getMyValidCreatedToday()
    {
        return $this->getMyCreatedToday()->where('valid_after_ecoute', 1);
    }
    public function getMyNoValidCreatedToday()
    {
        return $this->getMyCreatedToday()->where('no_valid_after_ecoute', 1);
    }

    // return createdThisMonth / valid/ no vlaid (today)
    public function getMyCreatedThisMonth()
    {
        return Auth::user()->fiches()->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
    }
    public function getMyValidCreatedThisMonth()
    {
        return $this->getMyCreatedThisMonth()->where('valid_after_ecoute', 1);
    }
    public function getMyNoValidCreatedThisMonth()
    {
        return $this->getMyCreatedThisMonth()->where('no_valid_after_ecoute', 1);
    }

    public function mesFiches()
    {
         if(Auth::user()->role_id == 16) {

            $fiches = Auth::user()->fiches;
        }
        else {
        $fiches = Auth::user()->fiches()
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();
        }
        if (Request()->ajax()) {
            return $fiches;
        } else {
            $title = "Mes Fiches";
            return view('app.fiches.index-mes-fiches', compact('fiches', 'title'));
        }
    }

    public function nonConforme()
    {
       
        $fiches = Auth::user()->fiches()->where('status_id', 21)->get();
        if (Request()->ajax()) {
            return $fiches;
        } else {
            $title = "Non conforme";
            return view('app.fiches.index-non-conforme', compact('fiches', 'title'));
        }
    }


    public function mesRappels()
    {
        $fiches = Auth::user()->rappels()->get();
        if (Request()->ajax()) {
            return $fiches;
        } else {
            $title = "Mes Rappels";
            return view('app.fiches.index-mes-fiches', compact('fiches', 'title'));
        }
    }

    public function myTeam()
    {
        $teamMonthTotal = Fiche::thisMonthAgent(date('m'));
        $teamDayTotal = Fiche::toDayAgent();
        $teamValidMonthTotal = $teamMonthTotal->where('valid_after_ecoute', 1);
        $teamNoValidMonthTotal = $teamMonthTotal->where('no_valid_after_ecoute', 1);

        return [
            'teamMonthTotal' => $teamMonthTotal->count(),
            'teamDayTotal' => $teamDayTotal->count(),
            'teamValidMonthTotal' => $teamValidMonthTotal->count(),
            'teamNoValidMonthTotal' => $teamNoValidMonthTotal->count()
        ];
    }
}
