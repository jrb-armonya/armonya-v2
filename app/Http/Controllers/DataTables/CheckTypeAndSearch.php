<?php
namespace App\Http\Controllers\DataTables;

use App\Fiche;
use Carbon\Carbon;

class CheckTypeAndSearch {

    /**
     * Celle class renvoi les fiches au DataTable selon $type.
     * 1 -  Les Fiches par status
     * 2 -  Toutes les fiches
     * 3 -  Les fiches No Valid
     * 4 -  Faites par rapport a un status (écoutées, confirmées et reportées)
     * 5 -  Les fiches crées ce mois avec la possibilité de choisir ques les fiches 
     *      des agents ou toutes les fiches.
     * 
     * TODO: 
     */

    public function getStatus($type, $start, $limit, $order, $dir, $status_id, $search, $start_d, $end_d) {
        
        $recordsTotal = Fiche::where('status_id', $status_id)->count();
        $recordsFiltered = $recordsTotal;

        if(empty($search)){
            $fiches =  Fiche::where('status_id', $status_id)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->with('status');

            // Check Date Range
            if($start_d != '') {
                $end_d == '' ? $end = '2200-12-30' : $end = $end_d;
                $start = Carbon::parse($start_d);
                $end = Carbon::parse($end);

                $fiches = $fiches->whereDate('d_rv', '>=', $start)->whereDate('d_rv', '<=', $end);
                $recordsFiltered = Fiche::where('status_id', $status_id)->whereDate('d_rv', '>=', $start)->whereDate('d_rv', '<=', $end)->count();
            }
            
        }
        else {

            $fiches =  Fiche::where('status_id', $status_id)->where(function($q) use ($search) {

                $q->where('id', 'LIKE', "%{$search}%")->orWhere('name', 'LIKE', "%{$search}%");

            })->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->with('status');

            $recordsFiltered = Fiche::where('status_id', $status_id)->where(function($q) use ($search){

                $q->where('id', 'LIKE', "%{$search}%")->orWhere('name', 'LIKE', "%{$search}%");

            })->count();

            // Check Date Range
            if($start_d != '') {
                $end_d == '' ? $end = '2200-12-30' : $end = $end_d;
                $start = Carbon::parse($start_d);
                $end = Carbon::parse($end);

                $fiches = $fiches->whereDate('d_rv', '>=', $start)->whereDate('d_rv', '<=', $end);

                $recordsFiltered = Fiche::where('status_id', $status_id)->where(function($q) use ($search){

                    $q->where('id', 'LIKE', "%{$search}%")->orWhere('name', 'LIKE', "%{$search}%");

                })->whereDate('d_rv', '>=', $start)->whereDate('d_rv', '<=', $end)->count();
            }
        }

        $fiches = $fiches->get();
        return [$fiches, $recordsTotal, $recordsFiltered];
    }
    
    public function getAll($type, $start, $limit, $order, $dir, $search, $start_d, $end_d){

        $recordsTotal = Fiche::count();
        $recordsFiltered = $recordsTotal;

        if(empty($search)){
            $fiches =  Fiche::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->with('status');

            // Check Date Range
            if($start_d != '') {
                $end_d == '' ? $end = '2200-12-30' : $end = $end_d;
                $start = Carbon::parse($start_d);
                $end = Carbon::parse($end);

                $fiches = $fiches->whereDate('d_rv', '>=', $start)->whereDate('d_rv', '<=', $end);
                $recordsFiltered = Fiche::whereDate('d_rv', '>=', $start)->whereDate('d_rv', '<=', $end)->count();
            }
            
        }
        else {
            
            $fiches =  Fiche::where(function($q) use ($search){
                $q->where('id', 'LIKE', "%{$search}%")->orWhere('name', 'LIKE', "%{$search}%");
            })->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->with('status');
            $recordsFiltered = Fiche::where(function($q) use ($search){
                $q->where('id', 'LIKE', "%{$search}%")->orWhere('name', 'LIKE', "%{$search}%");
            })->count();

            // Check Date Range
            if($start_d != '') {
                $end_d == '' ? $end = '2200-12-30' : $end = $end_d;
                $start = Carbon::parse($start_d);
                $end = Carbon::parse($end);

                $fiches = $fiches->whereDate('d_rv', '>=', $start)->whereDate('d_rv', '<=', $end);

                $recordsFiltered = Fiche::where(function($q) use ($search){
                    $q->where('id', 'LIKE', "%{$search}%")->orWhere('name', 'LIKE', "%{$search}%");
                })->whereDate('d_rv', '>=', $start)->whereDate('d_rv', '<=', $end)->count();
            }
        }
        $fiches = $fiches->get();
        return [$fiches, $recordsTotal, $recordsFiltered];
    }
 
    public function getNoValid($type, $start, $limit, $order, $dir, $search, $start_d, $end_d) {
        $recordsTotal = Fiche::whereIn('status_id', \Config::get('status.noValid'))->count();
        $recordsFiltered = $recordsTotal;

        if(empty($search)){
            $fiches =  Fiche::whereIn('status_id', \Config::get('status.noValid'))
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->with('status');

            // Check Date Range
            if($start_d != '') {
                $end_d == '' ? $end = '2200-12-30' : $end = $end_d;
                $start = Carbon::parse($start_d);
                $end = Carbon::parse($end);

                $fiches = $fiches->whereDate('d_rv', '>=', $start)->whereDate('d_rv', '<=', $end);
                $recordsFiltered = Fiche::whereIn('status_id', \Config::get('status.noValid'))->whereDate('d_rv', '>=', $start)->whereDate('d_rv', '<=', $end)->count();
            }
            
        }
        else {

            $fiches =  Fiche::whereIn('status_id', \Config::get('status.noValid'))->where(function($q) use ($search) {

                $q->where('id', 'LIKE', "%{$search}%")->orWhere('name', 'LIKE', "%{$search}%");

            })->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->with('status');

            $recordsFiltered = Fiche::whereIn('status_id', \Config::get('status.noValid'))->where(function($q) use ($search){

                $q->where('id', 'LIKE', "%{$search}%")->orWhere('name', 'LIKE', "%{$search}%");

            })->count();

            // Check Date Range
            if($start_d != '') {
                $end_d == '' ? $end = '2200-12-30' : $end = $end_d;
                $start = Carbon::parse($start_d);
                $end = Carbon::parse($end);

                $fiches = $fiches->whereDate('d_rv', '>=', $start)->whereDate('d_rv', '<=', $end);

                $recordsFiltered = Fiche::whereIn('status_id', \Config::get('status.noValid'))->where(function($q) use ($search){

                    $q->where('id', 'LIKE', "%{$search}%")->orWhere('name', 'LIKE', "%{$search}%");

                })->whereDate('d_rv', '>=', $start)->whereDate('d_rv', '<=', $end)->count();
            }
        }

        $fiches = $fiches->get();
        return [$fiches, $recordsTotal, $recordsFiltered];




        // $totalData = Fiche::whereIn('status_id', \Config::get('status.noValid'))->count();
        // $totalFiltered = $totalData; 
        // if(empty($search)){
        //     $fiches =  Fiche::offset($start)
        //         ->whereIn('status_id', \Config::get('status.noValid'))
        //         ->limit($limit)
        //         ->orderBy($order,$dir)->get();
        // }
        // else {
        //     $fiches =  Fiche::whereIn('status_id', \Config::get('status.noValid'))
        //         ->orWhere('name', 'LIKE', "%{$search}%")
        //         ->orWhere('prenom', 'LIKE', "%{$search}%")
        //         ->orWhere('cp', 'LIKE', "%{$search}%")
        //         ->offset($start)
        //         ->limit($limit)
        //         ->orderBy($order,$dir)
        //         ->get();

        //     $totalFiltered =  Fiche::where('id', 'LIKE', "%{$search}%")
        //         ->count();
        // }

        // return [$fiches, $totalData, $totalFiltered];
    }

    public function getDoneStatus($type, $start, $limit, $order, $dir, $status_id, $search, $start_d, $end_d) {
        
        $totalData = Fiche::where('status_id', $status_id)->count();
        $totalFiltered = $totalData; 

        if(empty($search)){
            if($status_id == 1) {
                $fiches =  Fiche::whereMonth('d_ecoute', date('m'))->whereYear('d_ecoute', date('Y'))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            if($status_id == 3) {
                $fiches =  Fiche::whereMonth('d_repo', date('m'))->whereYear('d_repo', date('Y'))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            if($status_id == 5) {
                $fiches =  Fiche::whereMonth('d_confirm', date('m'))->whereYear('d_confirm', date('Y'))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            // if($status_id == 1){
            //     $fiches;
            // }
            // if($status_id == 3) {
            //     $fiches = $fiches->whereMonth('d_repo', date('m'))->whereYear('d_repo', date('Y'))->get();
            // }
            // if($status_id == 5) {
            //     $fiches = $fiches->whereMonth('d_confirm', date('m'))->whereYear('d_confirm', date('Y'))->get();
            // }
        }
        else {
            $fiches =  Fiche::where('status_id', $status_id)->where(function($q) use ($search, $start, $limit, $order, $dir) {
                $q->where('id', 'LIKE', "%{$search}%")->orWhere('name', 'LIKE', "%{$search}%")->orWhere('prenom', 'LIKE', "%{$search}%")->orWhere('cp', 'LIKE', "%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

        }

        return [$fiches, $totalData, $totalFiltered];
        
        
        
        // status id 1 A Ecouter
        
        // status id 5 Confirmée

        // status id 3 A Reporter
    }

    public function createdThisMonth($type, $start, $limit, $order, $dir, $search, $allUsers, $start_d, $end_d){

        $totalData = Fiche::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'));
        if($allUsers == "false"){
            $totalData = $totalData->whereHas('user', function($q){
                $q->where('role_id', 2);
            });
        }
        $totalData = $totalData->count();

        $totalFiltered = $totalData;
        if(empty($search)){
            $fiches =  Fiche::offset($start)
                ->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))
                ->limit($limit)
                ->orderBy($order,$dir);
            if($allUsers == "false"){
                $fiches = $fiches->whereHas('user', function($q){
                    $q->where('role_id', 2);
                });
            }
            $fiches = $fiches->get();
        }
        else {
            $fiches =  Fiche::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))  
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('id', 'LIKE', "%{$search}%")
                ->orWhere('prenom', 'LIKE', "%{$search}%")
                ->orWhere('cp', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir);

            if($allUsers == "false"){
                $fiches->whereHas('user', function($q){
                    $q->where('role_id', 2);
                });
            }
            $fiches = $fiches->get();

            $totalFiltered =  Fiche::where('id', 'LIKE', "%{$search}%")->count();
        }

        return [$fiches, $totalData, $totalFiltered];
    }
}