<?php

namespace App\Jobs;

use App\Fiche;
use App\Doublon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SearchDoublonsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        ini_set('max_execution_time', 300);
        $fiches = Fiche::where('status_id', '!=', 29)->get();

        $allFiches = $fiches->keyBy('id');
        
        foreach($allFiches as $theOne) {
            $otherFiches = $allFiches->forget($theOne->id);

            foreach($otherFiches as $theOther){

                if(($theOne->tel_fix != null) && ($theOne->tel_fix != "+33") && ($theOne->tel_fix != "+ (33) _ __ __ __ __")) {
                    if($theOne->tel_fix == $theOther->tel_fix) {
                        $double = Doublon::firstOrCreate(['fiche1' => $theOne->id, 'fiche2' => $theOther->id, 'subject' => 'tel_fix']);
                    }
                }

                if(($theOne->tel_mobile != null) && ($theOne->tel_mobile != "+33") && ($theOne->tel_mobile != "+ (33) _ __ __ __ __")) {
                    if($theOne->tel_mobile == $theOther->tel_mobile) {
                        $double = Doublon::firstOrCreate(['fiche1' => $theOne->id, 'fiche2' => $theOther->id, 'subject' => 'tel_mobile']);
                    }
                }

                if($theOne->name == $theOther->name) {
                    $double = Doublon::firstOrCreate(['fiche1' => $theOne->id, 'fiche2' => $theOther->id, 'subject' => 'name']);
                }

            }

        }
    }
}
