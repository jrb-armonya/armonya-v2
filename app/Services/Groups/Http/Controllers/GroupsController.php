<?php

namespace App\Services\Groups\Http\Controllers;

use App\Http\Controllers\Controller;

class GroupsController extends Controller
{
    public function index()
    {
        return view('groups::index')->with('title', 'Groups');
    }
}