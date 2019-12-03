<?php 

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Action;
use Auth;

class ActionsController extends Controller {


    // A Supprimer ?
    public function saveAction($data){
        $action = Action::create($data);
    }

   public function last(){
       return Action::orderBy('id', 'desc')->with('user')->with('fiche')->with('newStatus')->with('oldStatus')->take(10)->get();
   }

}