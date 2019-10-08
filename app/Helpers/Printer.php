<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\PrinterHelper;
use Auth;

use App\Status;
use App\Page;


class Printer extends Controller
{  
    /**
     * Print the menu for the user if he as the permission for one page.
     */
    public static function print_menu()
    {
        
        //get all pages
        $pages = Page::select('id', 'name', 'url', 'class', 'parent', 'isActive')->get();

        for($i = 0; $i < $pages->count(); $i++ )
        {
            $page = $pages[$i];
            if(Auth::user()->havePerm($page->name))
            {
                if(!$page->isActive) 
                continue;

                if($page['parent'] === null)
                {
                    echo PrinterHelper::single($page);
                }
                // !important if parent == 0 so it's a parent!
                elseif($page['parent'] === 0)
                {
                    echo "<li class='sub-menu'>";
                    echo PrinterHelper::parent($page);
                    $subs = Page::where('parent', $page['id'])->get();
                        echo "<ul class='sub'>";
                        foreach($subs as $sub)
                        {
                            if(Auth::user()->havePerm($sub->name))
                            {
                                echo PrinterHelper::sub($sub, $page->url);
                            }
                        }
                        echo "</ul>";
                    echo "</li>";
                }
            }
        }
    }
    //Print ths status available (all status)
    public static function print_status()
    {
        $status = Status::all();
        foreach($status as $s)
        { 
            if(Auth::user()->role->permission($s->class))
            {
                echo
                "<li>" .
                    "<a href='" . url('/') . "/fiches/status/$s->id'>" .
                        "<i class='fa fa-circle-o' style='color: #$s->color'></i>".
                        "<span>{$s->name}</span>".
                        "<span class='badge  ml-2 nbr-indicateur float-right' style='background-color: #$s->color' color='white'>{$s->fiches->count()}</span>".
                   "</a>".
                "</li>";
            }
        }
    }  

    public function disableEnablePage(Request $request)
    {
        $page = Page::find($request->id);
        $page->isActive ? $page->isActive = 0 : $page->isActive = 1;
        if($page->isParent())
        foreach($page->children() as $child)
        {
            $child->isActive ? $child->isActive = 0 : $child->isActive = 1;
            $child->save();
        }
        $page->save();
    }  
}
