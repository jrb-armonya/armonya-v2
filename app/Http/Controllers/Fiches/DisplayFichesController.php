<?php

namespace App\Http\Controllers\Fiches;

use App\Fiche;
use App\Action;
use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

/**
 * This Controller is made to display fiches on the application:
 */
class DisplayFichesController extends Controller
{

    public function __construct()
    {
        View::share('title', 'Fiches');
    }

    /**
     *  Get fiches by status
     *  @param int $id the id of the status
     *  @return view \Illuminate\View\View with $status and $type
     */
    public function getFichesByStatus($id)
    {
        $status = Status::find($id);
        $type = 'status';
        return view('app.fiches.datatables.index-status', compact('status', 'type'));
    }

    public function getDoneStatus($id)
    {
        $status = Status::find($id);
        $text = $status->name . ' Ce mois';
        $type = 'done_status';
        return view('app.fiches.datatables.index-status', compact('status', 'type', 'text'));
    }

    public function all()
    {
        $text = $title = 'Toutes les fiches';
        return view('app.fiches.datatables.index-all-fiches', compact('text'));
    }

    public function trash()
    {
        $text = 'Trash';
        return view('app.fiches.datatables.index-all-fiches', compact('text'));
    }

    public function noValid()
    {
        $text = 'noValid';
        $title = 'Archive';
        return view('app.fiches.datatables.index-all-fiches', compact('text', 'title'));
    }
    

    public function cibles()
    {
        $text = 'Archive Ciblée';
        $title = 'Archive';
        return view('app.fiches.datatables.index-all-fiches', compact('text', 'title'));
    }

    
     
    public function createdMonth()
    {
        $text = 'Créer ce mois';
        return view('app.fiches.datatables.index-all-fiches', compact('text'));
    }
    public function plateau()
    {
        $text = $title = 'Plateau';
        return view('app.fiches.datatables.index-all-fiches', compact('text'));
    }
    public function plateauValid()
    {
        $text = $title = 'Plateau Valid';
        return view('app.fiches.datatables.index-all-fiches', compact('text'));
    }
    public function plateauNoValid()
    {
        $text = $title = 'Plateau Non Valid';
        return view('app.fiches.datatables.index-all-fiches', compact('text'));
    }
    public function postConfConfirmed()
    {
        $text = $title = 'Fiches Confirmées';
        return view('app.fiches.datatables.index-all-fiches', compact('text'));
    }
}
