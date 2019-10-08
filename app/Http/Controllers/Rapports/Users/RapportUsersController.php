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

    public function getDetailsOf($id, $type, $month = null){
        $user = User::find($id);
        if($type == "trait"){
            $fiches = $user->reportedMonth($month)->get();
        }
        if($type == "pris"){
            $fiches = $user->reportedMonth($month)
                ->whereIn('status_id', [4, 5, 6, 7, 8, 10])->get();
        }
        if($type == "conf"){
            $fiches = $user->reportedMonth($month)
            ->where('d_confirm', '>=', DB::raw('d_repo'))->get();
        }
        if($type == "env"){
            $fiches = $user->reportedMonth($month)
                ->where('d_confirm', '>=', DB::raw('d_repo'))
                ->where('d_env', '>=', DB::raw('d_repo'))
                ->whereIn('status_id', [7, 8, 10])->get();
        }

        View::share('text', 'Rapport Envoyées ' . $user->name);
        View::share('title', 'Rapport');
        $status = Status::find(3);
        return view('app.fiches.index-table', compact('fiches', 'status'));
    }

}