<?php
namespace App\Http\Controllers\Rapports\Users;

use App\Role;
use App\User;
use App\Fiche;
use App\Status;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class RapportUsersController extends Controller{
    
    public $fiches;

    public function getUserRapport($user, $role, $month, $year)
    {
        $role = Role::find($role);
        $user = User::find($user);
        // If report
        if($role->id == 7)
        {
            View::share('text', 'Rapport ' . $user->name);
            View::share('title', 'Rapport');
            $fiches = Fiche::where('repo_id', $user->id)->whereMonth('d_repo', $month)->whereYear('d_repo', $year)->get();
            $status = Status::find(3);
            return view('app.fiches.index-table', compact('fiches', 'status'));

        }
    }

    public function getDetailsOf($id, $type, $month = null, $year = null){

        $user = User::find($id);

        if($type == "trait"){
            $fiches = $user->reports()
                ->whereMonth('created_at', session()->has('month') ? session('month') : $month)
                ->pluck('fiche_id');
        }
        if($type == "pris"){
            $fiches = $user->reports()
            ->whereMonth('created_at', session()->has('month') ? session('month') : $month)
            ->whereHas('fiche', function($q){
                $q->whereNotIn('status_id', \Config::get('status.noValid'));
            })->pluck('fiche_id');
        }

        if($type == "conf"){
            // $f = new Fiche();
            $fiches = $user->reports()
            ->whereIn('state', [1,2])
            ->whereMonth('updated_at', session()->has('month') ? session('month') : $month)
            ->whereYear('updated_at', session()->has('year') ? session('year') : $year)->pluck('fiche_id');
            // $fiches = $user->reportedMonth($month)
            // ->where('d_confirm', '>=', DB::raw('d_repo'))->pluck('fiche_id');
        }
        if($type == "env"){
            // $f = new Fiche();
            $fiches = $user->reports()
                ->where('state', 2)
                ->whereMonth('updated_at', session()->has('month') ? session('month') : $month)
                ->whereYear('updated_at', session()->has('year') ? session('year') : $year)->pluck('fiche_id');
        }

        $fiches = Fiche::whereIn('id', $fiches)->get();

        View::share('text', 'Rapport Envoyées ' . $user->name);
        View::share('title', 'Rapport');
        $status = Status::find(3);
        return view('app.fiches.index-table', compact('fiches', 'status'));
    }

}