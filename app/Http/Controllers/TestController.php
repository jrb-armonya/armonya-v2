<?php

namespace App\Http\Controllers;

use App\Repositories\Rapports\ReportRepository;
use App\Repositories\Fiches\FichesRepository;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $fiche;
    protected $report;

    public function __construct(FichesRepository $fiche, ReportRepository $report)
    {
        $this->fiche = $fiche;
        $this->report = $report;
    }

    public function repoTest()
    {
        dd($this->fiche->all()->execute());
    }
}
