<?php

namespace App\Services\Predictif\Http\Controllers\Plugins;

use App\Services\Predictif\Models\Phone;
use App\Services\Predictif\Models\Societe;

class InvertMagasin {

    public function invert($id)
    {

        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 0);

        $soc = Societe::find($id);

        $soc->inverted = 1;
        $soc->save();


        $newSoc = new Societe();

        $newSoc->name = $soc->name . ' -- reverse';
        $newSoc->nbr_phones = $soc->nbr_phones;
        $newSoc->comment = $soc->comment;
        $newSoc->adresse = $soc->adresse;
        $newSoc->inFile = 1;
        $newSoc->standard = $soc->standard;
        $newSoc->file_id = null;
        $newSoc->inverted = 1;
        $newSoc->save();

        if($soc->phones->first() > $soc->standard) {

            for ($i = 1; $i <= $newSoc->nbr_phones; $i++){

                $newSoc->standard--;

                Phone::create(['nbr' => $newSoc->standard, 'used' => 0, 'societe_id' => $newSoc->id]);

            }

        } else {

            for ($i = 1; $i <= $newSoc->nbr_phones; $i++){

                $newSoc->standard ++;

                Phone::create(['nbr' => $newSoc->standard, 'used' => 0, 'societe_id' => $newSoc->id]);

            }
        }

        // }

        return redirect()->back();
    }


}