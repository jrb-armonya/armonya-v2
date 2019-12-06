<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Url extends Controller
{   
    public static function getViewName() {
        $url = explode('/', \Request::url());
        $current = $url[ count($url) - 1 ];
        return ucFirst($current);
    }

    public static function firstParameterRequestPath($path) {
        $path_array = explode('/', $path);
        return $path_array[0];
    }

    public static function secondParameterRequestPath($path) {
        $path_array = explode('/', $path);
        if(count($path_array) == 1)
            return '';
        else
            return $path_array[1];
    }
}
