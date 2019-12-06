<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

use App\Permission;

class PermissionsController extends Controller
{
    public function store(Request $request) {
        $permission = new Permission();
        $permission->name =  strtolower(str_replace(' ', '-',$request->name));
        $permission->desc = $request->desc;
        $permission->type = 2;
        $permission->save();

        return back();

    }

    public function delete(Request $request)
    {
        $permission = Permission::find($request->id);
        if($permission->roles->count() != 0) {
            return response()->json( ['roles' => $permission->roles], 500);
        }
        else {
            $permission->delete();
        }
        return response()->json(500);
    }
}
