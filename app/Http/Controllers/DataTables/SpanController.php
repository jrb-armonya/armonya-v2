<?php

namespace App\Http\Controllers\DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SpanController extends Controller
{
    /** getUserSpan function qui retourne le <a> avec class du user_id
     * @param $user
     * @return string
     *
     */
    public static function getUserSpan($user)
    {
        if($user->deleted_at == null)
            $user = "<a href='users/$user->id'>" . $user->name . "</a>";
        else
            $user = $user->name;
        return $user;
    }

    /** getCgpSpan retourn le span du CGP
     *
     * @param $cgp
     * @return string
     */
    public static function getCgpSpan($cgp)
    {
        $style ="";
        if($cgp == 0)
            $style = "color:  #80808078 ;";
        if($cgp == 1)
            $style = "color: red; text-shadow: 0px 0px 4px #ff0f0fbf;";
        if($cgp == 2)
            $style = "color: green; text-shadow: 0px 0px 4px #038e03de;";

        return"<i class=\"icon-user\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Nom du consultant\" style=\"font-size: 20px; $style\"></i>";
    }

    /** getCabSpan function retourne le span du CAbB
     * @param $lieux
     * @param $arr
     * @return string
     */
    public static function getCabSpan($lieux, $arr)
    {

        if($lieux != 3)
            $style = "color:  #80808078 ;";

        elseif($lieux == 3 && is_null($arr))
            $style = "color: red; text-shadow: 0px 0px 4px #ff0f0fbf;";
        elseif (!is_null($arr))
            $style = "color: green; text-shadow: 0px 0px 4px #038e03de;";

        return "<i class=\"icon-home\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Arrondissement du Cabinet\" style=\" font-size: 20px; $style\"></i>";
    }


     /**
     * getJoursRestants function retourn le nombre de jours restants par rapport à la date_rendez_vous
     *
     * @param Carbon $date
     * @return string
     */
    public static function getJoursRestants($date)
    {
        $date = Carbon::parse($date);
        if($date->diffInDays() == 0 )
            $diff =  '<td><span class="badge badge-danger"> AJOURD HUI</span></td>';
        elseif(!$date->isPast())
            $diff = "<td><span class='badge badge-success'>" . $date->diffInDays() . " jours restants</span></td>";
        elseif ($date->isPast())
            $diff = "<td><span class='badge badge-warning'>" . $date->diffInDays() . " jours passés</span></td>";
        return $diff;
    }

    /**
     * 
     */
    public static function getSmsSpan($sms_conf, $sms_prise)
    {
        if($sms_prise == 0)
        {
            $buildPrise =  "<i class='ti-mobile' data-toggle=\"tooltip\" data-placement=\"top\" title=\"SMS prise de rendz-vous\" style='color: #8080808a; font-size:20px;'></i>";
        }
        elseif($sms_prise == 1)
        {
            $buildPrise =  "<i class='ti-mobile' data-toggle=\"tooltip\" data-placement=\"top\" title=\"SMS prise de rendz-vous\"  style='color:red; font-size:20px;'></i>";
        }
        elseif($sms_prise == 2)
        {
            $buildPrise =  "<i class='ti-mobile' data-toggle=\"tooltip\" data-placement=\"top\" title=\"SMS prise de rendz-vous\"  style='color:green; font-size:20px;'></i>";
        }

        if($sms_conf == 0)
        {
            $buildConf =  "<i class='ti-email' data-toggle=\"tooltip\" data-placement=\"top\" title=\"SMS de confirmation\"  style='color: #8080808a; font-size:20px;'></i>";
        }
        elseif($sms_conf == 1)
        {
            $buildConf =  "<i class='ti-email' data-toggle=\"tooltip\" data-placement=\"top\" title=\"SMS de confirmation\"  style='color:red; font-size:20px;'></i>";
        }
        elseif($sms_conf == 2)
        {
            $buildConf =  "<i class='ti-email' data-toggle=\"tooltip\" data-placement=\"top\" title=\"SMS de confirmation\"  style='color:green; font-size:20px;'></i>";
        }


        $build = $buildPrise . ' ' . $buildConf;
        return $build;
    }
}
