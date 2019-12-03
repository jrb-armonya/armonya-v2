<?php
namespace App\Services\Predictif\Http\Controllers\Societes;

use App\Services\Predictif\Repositories\Societes\SocieteRepository;


class DeleteSociete {

    protected $societe;

    /**
     * __construct
     *
     * @param SocieteRepository $societe
     * @return void
     */
    public function __construct(SocieteRepository $societe)
    {
        $this->societe = $societe;
    }

    /**
     * destroy
     *  supprime une societe
     * @param mixed $id
     * @return void
     */
    public function delete($id)
    {
        $this->societe->destory($id);
        return redirect()->back();
    }
}