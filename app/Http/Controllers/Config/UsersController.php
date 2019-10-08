<?php

namespace App\Http\Controllers\Config;

use Hash;
use App\Role;
use App\User;
use Response;
use Validator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UsersController extends Controller
{
    
    public function __construct() {
        View::share('title', 'Utilisateurs');
    }
    public function index()
    {
        if(Auth::user()->role_id == 6)
        {
            $users = User::where('role_id', 2)->get();
        }
        else{
            $users = User::all();
        }
        
        $roles = Role::all();
        return view('app.users.index', compact('users', 'roles')    );
    }

    //function ajax to get an User (from: user index)
    public function getUser(Request $request )
    {
        return json_encode( User::with('role')->where('id', $request->id)->get() );
    }

    //update a user
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $role_id = $request->role;
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'nullable|min:4|confirmed',
            'role_id' => 'required',
            'fictif' => 'max:15',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != ''){
            $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->role_id;
        $user->fictif = $request->fictif;
        $user->save();

        return Redirect()->back();
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return $user;
    }

    public function createUser(Request $request)
    {

    
        $data = $request->all();
        
        $validator =  Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return $user;
    }

}
