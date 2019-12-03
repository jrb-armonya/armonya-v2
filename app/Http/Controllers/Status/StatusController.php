<?php

namespace App\Http\Controllers\Status;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Status\StatusHelper;


use App\Status;
use Auth;

class StatusController extends Controller
{
    public static function statusAllowed($id)
    {
        $allowed = StatusHelper::allowerdStatus($id);
        return $allowed;
    }
}
