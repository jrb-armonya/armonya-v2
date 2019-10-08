<?php
namespace App\Http\Controllers\Status;

use Auth;
use App\Action;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Report\ReportHelper as ReportHelper;
use App\Http\Controllers\Actions\ActionsController as Actions;
use App\Http\Controllers\Partenaires\PartenaireHelper as PartenaireHelper;

class StatusHelper extends Controller
{
    /** formatStatus(): par rapport aux status, une action est réalisée.
     * @param array $data   all the Fiche data
     * @param int   $old    the old id !! if the @old is 0 then it's just an 
     *  update without changing the status '$new = $old'
     * @param int   $new    the new id
    */
    public static function formatStatus($data, $fiche, $old, $new)
    {
        $action = new Action();
        $action->fiche_id = $data['id'];
        $action->user_id = Auth::user()->id;
        $action->new_status = $new;
        $action->old_status = $old;
        
        // just update the fiche (same status)
        if( $new == 0 ) {
            $data['status_id'] = $old ;

            // if the fiche is in A Reporter reprendre l'heure et la date du rappel
            if($old == 3){
                $data = ReportHelper::setDateHeureRappel($data);
            }
            $action->action = "Edit";
            $action->new_status = $old;
            
            /* quand l'update se fait et il y a un partenaire_id
            parceque le partenaire_id n'existe pas dans la 'request' 
            donc il faut le rajouter */
            if($fiche->partenaire_id != null){
                $data['partenaire_id'] = $fiche->partenaire_id;
            }

            /* Si un agent sort un rendez-vous de Non conforme, sur le front,
             le status est 0 danc il faut le changer 1 (A Ecouter) */
            if($old == 21){
                $data['status_id'] = 1;
                $data['retour'] = 1;
                $data['created_at'] = Carbon::now();
                $data['conf_id'] = null;
                $data['ecoute_id'] = null;
                $data['repo_id'] = null;
                $data['env_id'] = null;
                $data['rtv_id'] = null;
                $data['d_confirm'] = null;
                $data['d_ecoute'] = null;
                $data['d_cible'] = null;
                $data['d_env'] = null;
                $data['d_repo'] = null;
                $data['d_rtv'] = null;
            }
        }

        // Sort de l'écoute
        if ( $old == 1 && $new != 0 ){
            //No valid after ecoute
            if( in_array($new, Config('status.noValid') )) {
                $data['no_valid_after_ecoute'] = 1;
            }
            else {
                $data['valid_after_ecoute'] = 1;
             }
            // save the ecoute_id
            $data['ecoute_id'] = Auth::user()->id;
            $data['d_ecoute'] = \Carbon\Carbon::now();
            $data['retour'] = null;
            $action->action = "Ecoute";
        }

        // entre dans A Ecouter
        if($new == 1){
            $action->action = "Retour A Ecouter";
        }

        // Check if the user is from Report (new update)
        if( Auth::user()->role_id == 7 ) {
            $data['repo_id'] = Auth::user()->id;
            $data['d_repo'] = \Carbon\Carbon::now();
        }




        //Entre dans A Reporter
        if( $new == 3 ) {
            $action->action = "Fiche reportée";
            $data = ReportHelper::setDateHeureRappel($data);
        }

        //Sort de A Repporter
        if( $old == 3 && $old != $new && $new != 0) {

            $data['repo_id'] = Auth::user()->id;
            $data['d_repo'] = \Carbon\Carbon::now();
            // $data['d_rappel'] = $data['h_rappel'] =  null;
            $data = ReportHelper::setDateHeureRappel($data);
            $action->action = "Report";
            $action->new_status = $old;
        }

        // Entre dans A Confirmer
        if( $new == 4 ) {
            $action->action = "A Confirmer";
        }

        // Entre dans Confirmée
        if( $new == 5 ) {
            $data['conf_id'] = Auth::user()->id;
            $data['d_confirm'] = \Carbon\Carbon::now();
            $action->action = "Confirmée";
        }

        if( $new == 6 ) {
            $action->action = "A Envoyer";
        }

        // Entre dans Attente CR(fiche envoyé)
        if( $new == 7 ) {
            // PartenaireHelper::checkIfFicheHasOldPartenaire();
            $data['env_id'] = Auth::user()->id;
            $data['d_env'] = \Carbon\Carbon::now();
            $action->action = "Partenaire";
        }

        // Entre dans Attente CR (fiche envoyé)
        if( $new == 8 ) {
            $action->action = "CQ";
        }

        // Entre dans Ciblé
        if( $new == 10 ) {
            $data['d_cible'] = \Carbon\Carbon::now();
            $data['cible_id'] = Auth::user()->id;
            $action->action = "Cible";
        }
        
        //litige
        if( $new == 9 ) {
            $action->action = "Litige";
        }

        // Sort des non valides
        if( $new == 2 ){
            $action->action = "A Retravailler";
        }

        // Entre dans noValid
        if( in_array($new, Config('status.noValid')) ){
            $action->action = "Déqualification";
        }

        // Entre dans Reporter A Chaud
        if( $new == 25 ){
            $action->action = "Report a chaud";
        }
        
        $action->save();

        return ['data' => $data, 'action' => $action];
    }

    /**
     * Cette function elle permet de retourner une liste de status qui 
     * sont permit dans l'update de la fiche
     * 
     * @param int $id
     * @return Collection $allowed liste des fiches allowed
     */
    public static function allowerdStatus($id)
    {
        $noValid = Status::where('type', -1)->get();

        // A Ecouter
        // little hack to have the A Confirmer the first and A Retravailler the last
        if ( $id == 1 ) {
            $aRetravailler = Status::where('id', 2)->first();
            $aConfirmer = Status::where('id', 4)->first();
            $noValid->push($aRetravailler);
            $noValid->prepend($aConfirmer);
            return $noValid;
        }

        // A Retravailler
        else if ( $id == 2 ) {
            $allowed = Status::whereIn('id', [1, 3, 4, 25])->get();
        }
        
        //A Reporter
        else if ( $id == 3 ) {
            $allowed = Status::all();
        }
        
        // A Confirmer
        else if ( $id == 4 ) {
            $allowed = Status::whereIn('id', [2, 5, 1, 25, 3, 28 ])->get();
        }

        // Confirmée
        else if ( $id == 5 ) {
            $allowed = Status::whereIn('id', [6, 4, 1, 3 ])->get();
        }

        // A Envoyer
        else if ( $id == 6 ) {
            $allowed = Status::whereIn('id', [7, 6, 4, 1, 3 ])->get();
        }

        // Attente CR
        else if ( $id == 7 ) {
            $allowed = Status::whereIn('id', [10, 8, 7, 6, 4, 1, 3 ])->get();
        }

        // Contrôle Qualité
        else if ( $id == 8 ) {
            $allowed = Status::whereIn('id', [3, 10, 9])->get();
        }


        // litige
        // TODO: RAJOUTER id = 4 (A COFIRMER)
        else if ( $id == 9 ) {
            $allowed = Status::whereIn('id', [10, 8, 7, 3, 31])->get();
            $aConfirmer = Status::where('id', 4)->first();
            $allowed->prepend($aConfirmer);
        }
        // Ciblée
        else if ( $id == 10 ) {
            $allowed = Status::whereIn('id', [3, 10, 9])->get();
        }

        //si noValid
        else if( in_array($id, \Config('status.noValid'))){
            dd("YOUSSEF DEBUG");
            $allowed = Satus::whereIn([1, 2, 3 , 4 , 5, 6, 7, 8])->get();
        }
        return $allowed->merge($noValid);
    }
}
