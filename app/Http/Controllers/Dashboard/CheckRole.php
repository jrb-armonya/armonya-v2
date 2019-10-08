<?php
namespace App\Http\Controllers\Dashboard;

use App\Fiche;
use Carbon\Carbon;

class CheckRole{

    public function check($user)
    {
        // if Plateau
        if($user->role_id == 6){
            // Created by Agents (today / month)
            $fichesAgents = Fiche::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->whereHas('user', function($q){
                $q->where('role_id', 2);
            })->get();
            $fichesAgentsDay = Fiche::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->whereDay('created_at', date('d'))->whereHas('user', function($q){
                $q->where('role_id', 2);
            })->get();
            // validate (day / month)
            $fichesValidMonth = $fichesAgents->filter(function($val, $key){
                return $val['valid_after_ecoute'] == 1;
            });
            $fichesValidDay = $fichesAgentsDay->filter(function($val, $key){
                return $val['valid_after_ecoute'] == 1;
            });
            // noValidate (day / month)
            $fichesNoValidMonth = $fichesAgents->filter(function($val, $key){
                return $val['no_valid_after_ecoute'] == 1;
            });
            $fichesNoValidDay = $fichesAgentsDay->filter(function($val, $key){
                return $val['no_valid_after_ecoute'] == 1;
            });

            // Domicile (day / month)
            $fichesDomicileMois = $fichesAgents->filter(function($val, $key){
                return $val['l_rv'] == 1;
            });
            $fichesDomicileJour = $fichesAgentsDay->filter(function($val, $key){
                return $val['l_rv'] == 1;
            });
            $fichesDomicileSemaineMois = $fichesAgents->filter(function($val, $key){
                return $val['l_rv'] == 4;
            });
            $fichesDomicileSemaineJour = $fichesAgentsDay->filter(function($val, $key){
                return $val['l_rv'] == 4;
            });

        
            return  [
                'fichesAgents' => $fichesAgents,
                'fichesAgentsDay' => $fichesAgentsDay,
                'fichesValidMonth' => $fichesValidMonth,
                'fichesValidDay' => $fichesValidDay,
                'fichesNoValidMonth' => $fichesNoValidMonth,
                'fichesNoValidDay' => $fichesNoValidDay,

                'fichesDomicileMois' => $fichesDomicileMois,
                'fichesDomicileJour' => $fichesDomicileJour,
                'fichesDomicileSemaineMois' => $fichesDomicileSemaineMois,
                'fichesDomicileSemaineJour' => $fichesDomicileSemaineJour,
            ];
        }

        // if Post Confirmation
        if($user->role_id == 9){
            // Fiches for this month
            $fichesForThisMonth= Fiche::whereMonth('d_rv', date('m'))->whereYear('d_rv', date('Y'))->get();
            // Fiches for today
            $fichesForTomorrow =  Fiche::whereDate('d_rv', Carbon::tomorrow())->get();
            
            // Fiches Confirmed this month
            $fichesConfirmedThisMonth = Fiche::whereMonth('d_confirm', date('m'))
                ->whereYear('d_confirm', date('Y'))->get() ;
            // Fiches Confirmed Today
            $fichesConfirmedToday = Fiche::whereMonth('d_confirm', date('m'))
                ->whereYear('d_confirm', date('Y'))->whereDay('d_confirm', date('d'))->get();
            
            // Envoyés month
            $fichesSendMonth = Fiche::whereMonth('d_env', date('m'))->whereYear('d_env', date('Y'))
                ->get();
            // Envoyés today
            $fichesSendToday = Fiche::whereMonth('d_env', date('m'))->whereYear('d_env', date('Y'))
                ->where('d_env', date('d'))->get();

            return [
                'fichesForThisMonth' => $fichesForThisMonth,
                'fichesForTomorrow' => $fichesForTomorrow,
                'fichesConfirmedThisMonth' => $fichesConfirmedThisMonth,
                'fichesConfirmedToday' => $fichesConfirmedToday,
                'fichesSendMonth' => $fichesSendMonth,
                'fichesSendToday' => $fichesSendToday
            ];
            
        }

    }

}