<?php

namespace App\Http\Controllers\Fiches;

use Auth;
use App\Fiche;
use App\Action;
use App\Status;
use App\Export\Export;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Fiches\HistoricFiche;
use App\Http\Controllers\Archive\ArchiveController;
use App\Http\Controllers\Fiches\FicheHelper as FicheHelper;
use App\Http\Controllers\Status\StatusHelper as StatusHelper;
use App\Http\Controllers\Rapports\RapportsController as Rapports;
use App\Http\Controllers\Partenaires\PartenaireHelper as PartenaireHelper;


class FichesController extends Controller
{


    /**
     * create
     * return the view for creating new fiche
     * @return view
     */
    public function create()
    {
        $title = "Nouvelle Fiche";
        return view('app.fiches.create', compact('title'));
    }

    /**
     *  This function is named store but it has 2 main functionalities:
     *  #1 create a new fiche
     *  #2 update an old fiche (status or informations)
     *  #!! if the data contains 'status_id' than it's an update else 
     *  ## it's a create new fiche with status_id == 1; 
     */
    public function store(Request $request)
    {
       
        $user = $request->user();
        $data = $request->all();
        $date_rendez_vous = FicheHelper::getDateHeure($request->date_rendez_vous);
        $data = FicheHelper::formatData($request, $data, $date_rendez_vous);

        //Create new Fiche
        if (!isset($data['status_id'])) {

            $createdFiche = CreateFiche::createNew($user, $data);

            $fiche = $createdFiche['fiche'];
            $data = $createdFiche['data'];

            $action = new Action();
            $action->fiche_id = $fiche->id;
            $action->user_id = $data['user_id'];
            $action->action = "Création";
            $action->save();

            HistoricFiche::saveInit($fiche, $action);
        }

        //update an existing Fiche
        else {

            $fiche = Fiche::find($request->id);
            $oldFiche = $fiche;
            $old_status = $fiche->status_id;
            $new_status = $data['status_id'];

            $data = StatusHelper::formatStatus($data, $fiche, $old_status, $new_status);

            // verification si ARchive exite dans request
            // if existe => ArchiveController
            if($request->archive){
                $controller = new ArchiveController();
                $parts = $request->partenaires;
                $controller->putCibles($data,$parts);
            }


            // Envoi d'un email d'annulation à l'ancien partenaire.
            // Si et seulement si le nouveau status est Attente CR
            if ($request->email_annulation == "on") {
                if ($new_status == 7) {
                    $partenaireHelper = new PartenaireHelper();
                    if ($fiche->partenaire_id != null) {
                        $partenaireHelper->sendEmailAnnulation($fiche, $data['data']);
                    }
                }
            }

            // Envoi d'un email d'annulation si le rendez-vous est a reporter
            // et il a un partenaire
            if ($request->email_annulation == "on") {
                if ($new_status == 3) {
                    if ($old_status == 7) {
                        $partenaireHelper = new PartenaireHelper();
                        if ($fiche->partenaire_id != null) {
                            $partenaireHelper->sendEmailAnnulation($fiche, $data['data']);
                        }
                    }
                }
            }

            $fiche->open = false;
            $fiche->update($data['data']);

            HistoricFiche::saveInit($fiche, $data['action']);

            $fiche = Fiche::find($request->id);
            $export = new Export($fiche);
            $path = $export->exportToPdf();

            // Envoi d'un mail de confirmatoin au nouveau Partenaire
            if ($new_status == 7) {
                $partenaireHelper = new PartenaireHelper();
                if (!isset($data['data']['partenaire_emails_cc'])) {
                    $data['data']['partenaire_emails_cc'] = null;
                }
                $partenaireHelper->sendEmailConfirmation($fiche, $path, $data['data']['partenaire_emails'], $data['data']['partenaire_emails_cc']);

                $action = Action::where('fiche_id', $fiche->id)->where('action', 'Partenaire')->where('partenaire_id', null)->where('user_id', Auth::user()->id)->update(['partenaire_id' => $fiche->partenaire_id]);
            }
        }

        return back();
    }

    /**
     * Ajax call to get a fiche from fiches.index
     */
    public function getFiche(Request $request)
    {
        $fiche = Fiche::find($request->id);
        $fiche->open = true;
        $fiche->save();
        // openFiche($fiche);
        return $fiche->toArray();
    }

    //Close the fiche when close the modal
    public function closeFiche(Request $request)
    {
        $fiche = Fiche::find($request->id);
        $fiche->open = false;
        $fiche->save();
        return $fiche;
    }

    // has partenaire AJax
    public function hasPartenaireAjax(Request $request)
    {
        if (Fiche::find($request->id)->partenaire_id != null) {
            return "true";
        } else return "false";
    }
}
