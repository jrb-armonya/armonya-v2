<?php

namespace App\Http\Controllers\Config;

use App\Role;
use Redirect;
use App\Permission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class RolesController extends Controller
{

    public function __construct()
    {
        View::share('title', 'Rôles');
    }

    public function index()
    {
        $roles = Role::all();
        return view('app.roles.index', compact('roles'));
    }


    //ajouter un role
    public function store(Request $request)
    {
        $dirName = str_replace(' ', '_', $request->name);
        fopen(resource_path('views/app/parts/widgets/' . $dirName . '.blade.php'), 'w');
        // dd("HELLO");
        $role = new Role();
        $role->name = ucfirst($request->name);
        $role->desc = $request->desc;
        $role->class = strtolower($request->name);
        $role->color = ltrim($request->color, '#');
        $role->save();

        return back();
    }

    public function edit($id)
    {
        // $role = Role::find($id)->with('permissions');
        $role = Role::with('permissions')->where('id', $id)->get();
        $role = $role[0];
        $permissions = Permission::all();
        return view('app.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request)
    {
        $role = Role::find($request->id);
        $role->name = ucfirst($request->name);
        $role->desc = $request->desc;
        $role->class = strtolower($request->name);
        $role->color = ltrim($request->color, "#");
        $role->permissions()->sync($request->permissions);
        $role->save();
        return back();
    }

    public function roles()
    {
        return Role::all();
    }
}
