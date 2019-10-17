<?php

namespace App\Http\Controllers;

use App\Repositories\Fiches\FichesRepository;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $fiche;

    public function __construct(FichesRepository $fiche)
    {
        $this->fiche = $fiche;
    }

    public function repoTest()
    {
        dd($this->fiche->created(null, 10, 2019, true, null)->get());
    }
}
