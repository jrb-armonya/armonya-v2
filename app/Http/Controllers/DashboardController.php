<?php

namespace App\Http\Controllers;

use Auth;
use App\Role;
use App\Fiche;
use App\Status;
use App\Widget;
use App\Http\Controllers\Dashboard\CheckRole;


class DashboardController extends Controller
{

    protected $fichesByAgentsMonth;

    public function index()
    {
        $month = date('m');
        $widgets = Widget::where('role_id' , Auth::user()->role_id)->get();
        $status = Status::where('isActive', 1)->get();
        $title = "Dashboard";
        $roles = Role::all();
        $fiches = $this->checkRole();
        return view('app.index', compact('widgets', 'title', 'status', 'roles', 'month', 'fiches'));
    }


    private function checkRole(){
        $fiches = new CheckRole();
        return $fiches->check(Auth::user());



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
        else {
            return null;
        }
    }


}
