<?php
namespace App\Http\Controllers\Rapports;

use App\Fiche;

class RapportsWeek {
    public function weekProduction() {
        \Carbon\Carbon::setWeekStartsAt(\Carbon\Carbon::MONDAY);
        \Carbon\Carbon::setWeekEndsAt(\Carbon\Carbon::FRIDAY);

        $lundi = \Carbon\Carbon::now()->startOfWeek();
        $mardi = \Carbon\Carbon::now()->startOfWeek()->addDays(1);
        $mercredi = \Carbon\Carbon::now()->startOfWeek()->addDays(2);
        $jeudi = \Carbon\Carbon::now()->startOfWeek()->addDays(3);
        $vendredi = \Carbon\Carbon::now()->startOfWeek()->addDays(4);
        $samedi = \Carbon\Carbon::now()->startOfWeek()->addDays(5);


        $jours = [
            Fiche::thisMonthAgent(date('m'))->whereDate('created_at', $lundi)->count(),
            Fiche::thisMonthAgent(date('m'))->whereDate('created_at', $mardi)->count(),
            Fiche::thisMonthAgent(date('m'))->whereDate('created_at', $mercredi)->count(),
            Fiche::thisMonthAgent(date('m'))->whereDate('created_at', $jeudi)->count(),
            Fiche::thisMonthAgent(date('m'))->whereDate('created_at', $vendredi)->count(),
            Fiche::thisMonthAgent(date('m'))->whereDate('created_at', $samedi)->count(),
        ];


        return $jours;
    }
}