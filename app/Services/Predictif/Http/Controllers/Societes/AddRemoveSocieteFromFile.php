<?php
namespace App\Services\Predictif\Http\Controllers\Societes;

use App\Http\Controllers\Controller;
use App\Services\Predictif\Repositories\Societes\SocieteRepository;

class AddRemoveSocieteFromFile extends Controller{
    
    protected $societe;

    public function __construct(SocieteRepository $societe)
    {
        $this->societe = $societe;
    }

    public function add($id)
    {
        $this->societe->addRemoveFromFile($id, 1);
        return redirect()->back();
    }

    public function remove($id)
    {
        $this->societe->addRemoveFromFile($id, 0);
        return redirect()->back();
    }

}