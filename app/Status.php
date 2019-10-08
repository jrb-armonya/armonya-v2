<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    
    protected $table = 'status';

    public function fiches() {
        return $this->hasMany('App\Fiche');
    }

    public function doneThisMonth($id) {
        //If a ecouter
        if( $id == 1 ) {
            return Fiche::whereMonth('d_ecoute', date('m'))->whereYear('d_ecoute', date('Y'))->get();
        }
        //Confirmation
        if( $id == 5) {
            return Fiche::whereMonth('d_confirm', date('m'))->whereYear('d_confirm', date('Y'))->get();
        }
        if( $id == 3) {
            return Fiche::whereMonth('d_repo', date('m'))->whereYear('d_repo', date('Y'))->get();
        }
    }
    public function doneToday($id) {
        if( $id == 1 ) {
            return Fiche::whereDate('d_ecoute', Carbon::today())->get();
        }
        //Confirmation
        if( $id == 5) {
            return Fiche::whereDate('d_confirm', Carbon::today())->get();
        }
        // report
        if( $id == 3) {
            return Fiche::whereDate('d_repo', Carbon::today())->get();
        }
    }

}
