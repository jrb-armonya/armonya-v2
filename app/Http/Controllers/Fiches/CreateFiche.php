<?php

namespace App\Http\Controllers\Fiches;

use App\Fiche;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateFiche extends Controller
{


    static public function createNew($user, $data)
    {
        // if created by a report user
        if ($user->role_id == 7) {
            // put fiche in A Confirmer
            $data['status_id'] = 4;
            // Valid after ecoute
            $data['valid_after_ecoute'] = 1;
            // reported today
            $data['d_repo'] = Carbon::today();
            // get the report
            $data['repo_id'] = $user->id;

        }
        // else created by other (agent)
        else {
            if (isset($data['rappel']))
                $data['status_id'] = 29;
            else
                $data['status_id'] = 1;
        }

        $data['user_id'] = $user->id;

        return ['fiche' => Fiche::create($data), 'data' => $data];
    }
}
