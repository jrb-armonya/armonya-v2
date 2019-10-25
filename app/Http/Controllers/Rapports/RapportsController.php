<?php

namespace App\Http\Controllers\Rapports;

use App\Role;
use App\User;


use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Services\Groups\Models\Group;
use App\Http\Controllers\Rapports\RapportsWeek;

class RapportsController extends Controller
{

    public function __construct()
    {
        View::share('title', 'Rapports');
    }

    public function index()
    {
        $rapports = ['Agent', 'Ecoute', 'Confirmation', 'Report'];
        $roles = Role::whereIn('name', $rapports)->get();

        $groups = Group::All();
        return view ('app.rapports.index', compact('roles' , 'groups'));

    }

    /**
     * Renvoi le rapports d'un certain role
     * @param string $role name of the given role  
     * @return view app.rapport.{nom du role}.index
     */
    public function getRapportsByRole($role)
    {
        $month = date('m');
        $year = date('Y');
        $day = date('d');
        $role = Role::where('name', ucwords($role))->first();
        if ($role->name == "Report") {
            $users = User::whereIn('role_id', [15, 7])->get();
        } else {
            $users = User::where('role_id', $role->id)->get();
        }
        $status = Status::all();
        return view('app.rapports.' . strtolower($role->name) . '.index', compact('role', 'users', 'status', 'day', 'month', 'year'));
    }


    public function getRapportsGroups()
    {
        $month = date('m');
        $year = date('Y');
        $groups = Group::all();
        $status = Status::all();

        return view('app.rapports.groups.index', compact('groups', 'status', 'month', 'year'));

    }

    public function getRapportsByGroup($id)
    {
        $month = date('m');
        $year = date('Y');
        $group = Group::find($id);
        $status = Status::all();
        $users = $group->users()->get();
        return view('app.rapports.groups.group', compact('users','group', 'status', 'month', 'year'));
        
    }

    public function weekProduction() {
        $week = new RapportsWeek();
        return $week->weekProduction();
    }

    public function getRapportEcouteUser($id, $month)
    {

        $user = User::find($id);
        $month = $month;
        $year = date('Y');
        $mesFiches = $user->mesFichesThisMonth($month, $year);
        return view('app.rapports.agent.single', compact('user', 'mesFiches', 'month', 'year'));
    }

    public function monthSelect(Request $request)
    {

        $date = \explode('/', $request->month);
        $month = $date[0];
        $year = $date[1];

        return redirect()->back()->with('month', $month)->with('year', $year);
    }
}
