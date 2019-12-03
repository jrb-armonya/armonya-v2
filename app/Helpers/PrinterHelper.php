<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Page;

/**
 * PinterHelper
 * 3 function to print a Single menu part, A p²arent menu part or A Sub menu part
 */
class PrinterHelper extends Controller
{  
    
    public static function single($page)
    {
        $page = Page::find($page->id);
        '/' . \Request::path() == $page->url ? $active = 'active' : $active = '';
        return  
            "<li class='sub-menu'>
                <a href='" . url('/') . "{$page->url}'>
                    <i class='{$page->class} {$active}' ></i>
                    <span>{$page->name}</span>
                </a>
            </li>";
    }

    public static function parent($page)
    {
        $page = Page::find($page->id);
        '/' . \UrlHelper::firstParameterRequestPath(\Request::path()) == $page->url ? $active = 'active' : $active = '';
        return
            "<a href='javascript:;' class='{$active}'>
                <i class='{$page->class}'></i>
                <span>{$page->name}</span>
            </a>";
    }

    public static function sub($sub, $parent_url)
    {
        $sub = Page::find($sub->id);
        if(!$sub->isActive)
            return null;
        else
        if('/' . \UrlHelper::secondParameterRequestPath(\Request::path()) == $sub->url){
            return "<li><a  class='active-sub' href='" . url('/') . "{$parent_url}{$sub->url}'>{$sub->name}</a></li>";
        }
        else
            return "<li><a  class='' href='" . url('/') . "{$parent_url}{$sub->url}'>{$sub->name}</a></li>";
    }
}
