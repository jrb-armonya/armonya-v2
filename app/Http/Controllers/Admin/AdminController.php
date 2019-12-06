<?php

namespace App\Http\Controllers\Admin;

use App\Fiche;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getCreatedMonth() {
        $f = new Fiche();
        $fiches = $f->createdMonth(date('m'))->get();
        return view('app.fiches.index-table', compact('fiches'));
    }
    public function getEoutedMonth() {
        $f = new Fiche();
        $fiches = $f->ecoutedMonth(date('m'))->get();
        return view('app.fiches.index-table', compact('fiches'));
    }
    public function getConfirmedMonth() {
        $f = new Fiche();
        $fiches = $f->confirmedMonth(date('m'))->get();
        return view('app.fiches.index-table', compact('fiches'));
    }
    public function getReportedMonth() {
        $f = new Fiche();
        $fiches = $f->reportMonth(date('m'))->get();
        return view('app.fiches.index-table', compact('fiches'));
    }
}
