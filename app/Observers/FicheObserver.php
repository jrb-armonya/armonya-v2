<?php

namespace App\Observers;

use App\Fiche;
use Auth;

class FicheObserver
{
    /**
     * Handle the fiche "creating" event.
     *
     * @param  \App\Fiche  $fiche
     * @return void
     */
    public function created(Fiche $fiche)
    {
        if(Auth::user()->role_id == 7) {
            $fiche->status_id = 4;
            $fiche->valid_after_ecoute = 1;
            $fiche->d_repo = \Carbon\Carbon::today();
            $fiche->repo_id = Auth::user()->id;

            // $data['status_id'] = 4;
            // $data['valid_after_ecoute'] = 1;
            // $data['d_repo'] = \Carbon\Carbon::today();
            // $data['repo_id'] = Auth::user()->id;
        } 
        // else created by other (agent)
        else {
            $fiche->status_id = 1;
        }
        // $fiche->user_id = Auth::user()->id;
    }

    /**
     * Handle the fiche "updated" event.
     *
     * @param  \App\Fiche  $fiche
     * @return void
     */
    public function updated(Fiche $fiche)
    {
        //
    }

    /**
     * Handle the fiche "deleted" event.
     *
     * @param  \App\Fiche  $fiche
     * @return void
     */
    public function deleted(Fiche $fiche)
    {
        //
    }

    /**
     * Handle the fiche "restored" event.
     *
     * @param  \App\Fiche  $fiche
     * @return void
     */
    public function restored(Fiche $fiche)
    {
        //
    }

    /**
     * Handle the fiche "force deleted" event.
     *
     * @param  \App\Fiche  $fiche
     * @return void
     */
    public function forceDeleted(Fiche $fiche)
    {
        //
    }
}
