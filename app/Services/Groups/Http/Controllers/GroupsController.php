<?php

namespace App\Services\Groups\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Groups\Models\Group;
use App\Services\Groups\Http\Requests\StoreGroupRequest;
use App\Services\Groups\Http\Requests\UpdateGroupRequest;

class GroupsController extends Controller
{
    /**
     * index
     *
     * @return view
     */
    public function index()
    {
        $title = 'Group';
        $groups = Group::all();
        $users = User::all();
        return view('groups::index',compact('groups','title','users'));
    }

    /**
     * Store
     *
     * @param StoreGroupRequest $request
     * @return void
     */
    public function store(StoreGroupRequest $request)
    {
        $group = Group::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'color' => ltrim($request->color, '#')
        ]);

        $user_id = $request->user_id;
        $group->users()->attach([$user_id => ['role_id' => 1 ]]);

        return redirect()->back();
    }
    
    /**
     * Edit
     *
     * @param integer $id
     * @return view
     */
    public function edit(int $id)
    {
        $title='Edit Groupe';
        $group = Group::where('id', $id)->first();
        $users = User::all();
        return view('groups::edit', compact('group','users','title'));
    }

    /**
     * Update Group
     * Detach all users from group
     * Attach user_head
     * Attach users TA
     *
     * @param UpdateGroupRequest $request
     * @return view
     */
    public function update(UpdateGroupRequest $request)
    {
        $group = Group::find($request->id);

        $group->update([
            'name' => ucfirst($request->name),
            'desc' => $request->desc,
            'color' => ltrim($request->color, '#')
        ]);

        $group->users()->detach();
        $group->users()->attach([$request->user_id => ['role_id' => 1 ]]);

        if($request->users) {
            foreach($request->users as $user) {
                if($user != $request->user_id ){
                $group->users()->attach([$user => ['role_id' => 2 ]]);
                }
            }
        }
      
        return back();
    }
    
    public function delete(Request $request)
    {
        $group = Group::find($request->id);
        $group->users()->detach();
        $group->delete();
        return $group;
    }

}