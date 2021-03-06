<?php

namespace App\Http\Controllers\Fiches;

use Auth;
use App\User;
use App\Fiche;
use App\Action;
use App\Status;
use App\Partenaire;
use App\Export\Export;
use App\ReportManager;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Report\ReportHelper;
use App\Http\Controllers\Fiches\HistoricFiche;
use App\Http\Controllers\Archive\ArchiveController;
use App\Notifications\PartenaireReceiveFicheNotification;
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

            // If user is Report or Report Call 3 (id = 15)
            if (Auth::user()->role_id == 7 || Auth::user()->role_id == 15) {
                // Create new Report with ReportManager
                ReportHelper::newReport($fiche->id);
            }

            $action = new Action();
            $action->fiche_id = $fiche->id;
            $action->user_id = $data['user_id'];
            $action->action = "Création";
            $action->save();

            HistoricFiche::saveInit($fiche, $action);
        }

        //update an existing Fiche
        else {
            // dd($request->all());
            $fiche = Fiche::find($request->id);
            $oldFiche = $fiche;
            $old_status = $fiche->status_id;
            $new_status = $data['status_id'];

            $data = StatusHelper::formatStatus($data, $fiche, $old_status, $new_status);

            /**
             * Admin can Archive from "Ciblée" to "Archive Ciblé"
             * is_archived = 1
             * @Adding Partenaire when passing to Archive Ciblé is temporaray.
             */
            if ($request->archive) {
                $controller = new ArchiveController();
                $parts = $request->partenaires;
                $controller->putCibles($data, $parts);
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

            // Annulation du repot (ne compte plus pour l'utilisateur qui la fait)
            if ($request->report_annulation == "on") {
                // Delete the line on the reports table
                // dd(ReportManager::where('user_id', 200)->get());
                $report = ReportManager::where('user_id', $fiche->repo_id)->where('fiche_id', $fiche->id)->first();
                if ($report) {
                    $report->delete();
                }

                // dd(ReportManager::where('user_id', $fiche->repo_id)->where('fiche_id', $fiche->id)->first());
                $data['data']['repo_id'] = null;
                $data['data']['d_repo'] = null;
                // $data['repo_id'] = null;
            }

            $fiche->open = false;
            // dd($data['data']);
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

                // Get the partenaire
                $partenaire = Partenaire::find($fiche->partenaire_id);

                Notification::send($partenaire, new PartenaireReceiveFicheNotification($fiche, $partenaire));

            }
        }

        return back();
    }

    /**
     * Ajax call to get a fiche from fiches.index
     * 
     */
    public function getFiche(Request $request)
    {
        $fiche = Fiche::with('crs')->where('id', $request->id)->first();
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

    // Get reported By
    public function getReportedBy(Request $request)
    {
        return User::where('id', Fiche::find($request->id)->repo_id)->withTrashed()->first();
    }
}
