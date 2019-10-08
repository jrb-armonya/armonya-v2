<?php
namespace App\Http\Controllers\DataTables;

use App\Http\Controllers\DataTables\SpanController;
use App\Fiche;
use App\Status;

class NestedData {
    public static function nestedData($post, $status)
    {
        $nestedData['id'] = $post->id;
        $nestedData['name'] = '<b>' . $post->name . ' ' . $post->prenom . '</b>';
        if($post->isRetour()){
            $nestedData['name'] = '<b><i class="ti-help" style="color:red;"></i></b>' . $nestedData['name'];
        }
        if($status != null && $status->name == "A Reporter"){
            if($post->d_rappel == null){
                $nestedData['date_rappel'] = "<td style='color: red'> PAS DE DATE DE RAPPEL !</td>";
            }
            else{
                $nestedData['date_rappel'] = $post->d_rappel->format('d/m/Y');
            }
            $nestedData['heure_rappel'] = $post->h_rappel;
        }else{
            $nestedData['date_rendez_vous'] = date('d/m/Y', strtotime($post->d_rv));
            $nestedData['heure_rendez_vous'] = $post->h_rv;
        }
        $nestedData['cp'] = $post->cp;
        $nestedData['cgp'] = SpanController::getCgpSpan($post->cgp);
        $nestedData['cab'] = SpanController::getCabSpan($post->l_rv, $post->arrondissement);
        $nestedData['restants'] = SpanController::getJoursRestants($post->d_rv);
        if(!isset($status)){
            $nestedData['status'] = "<span class='badge badge-status badge-status-{$post->status_id}'>{$post->status->name}</span>";
        }
        $nestedData['created_at'] = date('d/m/Y H:i', strtotime($post->created_at));
        $nestedData['user_id'] = SpanController::getUserSpan($post->user);
        if( $status != null && $status->name ==  "Attente CR")
        {
            if($post->partenaire == null) { $nestedData['partenaire_id'] = null; } else $nestedData['partenaire_id'] = $post->partenaire->name;
        }

        if($post->nrp == 0)
        $nestedData['nrp'] = "<i data-toggle=\"tooltip\" data-placement=\"top\" title=\"NRP\" class='icon-phone' style='color: #adadad;font-size: 20px;'></i>";
        else $nestedData['nrp'] = "<i data-toggle=\"tooltip\" data-placement=\"top\" title=\"NRP\" class='icon-phone' style='color: red;font-size: 20px;'></i>";

        $nestedData['sms'] = SpanController::getSmsSpan($post->sms_conf, $post->sms_prise);

        if($post->open == 1) {
            $openHand = '<i class="ti-hand-open" style="font-size: 20px; color:#ff000091;"></i>';
        } else $openHand = '';
        $nestedData['action'] = '<i class="ti-search btn-open-fiche" data-id="' . $post->id . '"  style=""></i> <a href="'.url('/').'/historique/fiche/' .$post->id .'" target="_blank" ><i class="ti-direction-alt btn-historic"></i> </a> ' . $openHand . '<a href="'.url('/').'/pdf/' . $post->id .'" target="_blank"><i class="fa fa-file-pdf-o btn-historic"></i></a>';
        
        return $nestedData;
    }
}