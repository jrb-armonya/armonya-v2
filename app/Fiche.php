<?php

namespace App;

use App\ReportManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fiche extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'update_at', 'created_at', 'd_rv', 'd_rappel', 'date_retv', 'd_env'];

    public $fillable = [
        'user_id', 'status_id', 'genre', 'name', 'prenom', 's_age', 'age', 'profession', 'societe', 'adresse',
        'cp', 'ville', 'tel_fix', 'tel_mobile', 'tel_bureau', 'email', 'sf', 'nbr_enfants', 's_rev', 'rev_annee',
        'rev_mois', 'rev_loc', 'loy_eche', 'locataire', 'proprietaire', 'gratuit', 's_imp', 'imp_annee',
        'imp_mois', 'cre_res', 'cre_auto', 'cre_autre', 'cre_conso', 'cre_total', 'taux',
        'sms_conf', 'sms_prise', 'cgp', 'd_rv', 'h_rv', 'l_rv', 'd_confirm', 'd_ecoute', 'd_cible', 'd_env', 'd_rappel', 'd_repo', 'h_rappel',
        'ecoute_id', 'commentaire', 'is_archived', 'net', 'nrp', 'conf_id', 'repo_id', 'partenaire_id', 'env_id', 'valid_after_ecoute', 'arrondissement',
        'no_valid_after_ecoute', 'internal_comment', 'retour', 'created_at'
    ];

    protected function formatTelNumber($value)
    {
        $new = str_replace(' ', '', $value);
        $new = substr($new, 5);
        return $new;
    }

    // public function setTelFixAttribute($value) {
    //     $this->attributes['tel_fix'] = $this->formatTelNumber($value);
    // }

    // public function setTelMobileAttribute($value) {
    //     $this->attributes['tel_mobile'] = $this->formatTelNumber($value);
    // }

    // public function setTelBureauAttribute($value) {
    //     $this->attributes['tel_bureau'] = $this->formatTelNumber($value);
    // }





    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User')->withTrashed();
    }

    public function actions()
    {
        return $this->hasMany('App\Action');
    }
    public function isCible()
    {
        return $this->actions->where('action', 'Cible')->first();
    }

    public function partenaire()
    {
        return $this->belongsTo('App\Partenaire');
    }

    public function facture()
    {
        return $this->belongsTo('App\Facture');
    }


    public function noValid()
    {
        return $this->whereIn('status', \Config('status.noValid'))->get();
    }

    public function isRetour()
    {
        return $this->retour;
    }


    public function reports()
    {
        return $this->hasMany(ReportManager::class);
    }

    public static function thisMonthAgent($month)
    {
        return self::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))
            ->whereHas('user', function ($query) {
                $query->where('role_id', '=', 2);
            })->where('status_id', '!=', 29);
    }

    //All fiches create by users have group
    public static function thisMonthGroups($month, $year = null)
    {
        return self::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))
            ->whereHas('user', function ($query) {
                $query->whereHas('groups', function ($q) {
                    $q->where('group_id', '!=', null);
                });
            })->where('status_id', '!=', 29);
    }

    //fiches create by group
    public static function thisMonthGroup($id, $month, $year = null)
    {
        return self::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))
            ->whereHas('user', function ($query) use ($id) {
                $query->whereHas('groups', function ($q) use ($id) {
                    $q->where('group_id', $id);
                });
            })->where('status_id', '!=', 29);
    }

    public static function fichesGroupToday($id)
    {
        return self::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))
            ->whereHas('user', function ($query) use ($id) {
                $query->whereHas('groups', function ($q) use ($id) {
                    $q->where('group_id', $id);
                });
            })->where('status_id', '!=', 29);
    }

    public static function toDayAgent()
    {
        return self::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))
            ->whereHas('user', function ($query) {
                $query->where('role_id', '=', 2);
            })->where('status_id', '!=', 29)
            ->get();
    }
    public static function thisMonthOthers()
    {
        return self::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))
            ->whereHas('user', function ($query) {
                $query->where('role_id', '!=', 2);
            })
            ->get();
    }

    public function jPlus($d = null, $m = null, $y = null)
    {

        if ($y == null && $m == null && $d == null) {
            $fiches = Fiche::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'));
        } else {
            if ($y != null) {
                $fiches  = Fiche::whereYear('created_at', $y);
            }
            if ($m != null) {
                $fiches  = Fiche::whereMonth('created_at', $m);
            }
            if ($d != null) {
                $fiches  = Fiche::whereDay('created_at', $d);
            }
        }
        return $fiches->get();
    }

    /**
     *  function for the Rapports
     * 
     *  TODO: need to be refactored
     *  need the 'reworked, cibled, sended'
     */

    public function prod($d = null, $m = null, $y = null, $agent = null)
    {

        if ($agent) {
            $fiches = Fiche::whereHas('user', function ($q) {
                $q->where('role_id', 2);
            });
        } else {
            $fiches = DB::table('fiches');
        }
        if ($y == null && $m == null && $d == null) {
            $fiches = Fiche::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'));
        } else {
            if ($y != null) {
                $fiches  = $fiches->whereYear('created_at', $y);
            }
            if ($m != null) {
                $fiches  = $fiches->whereMonth('created_at', $m);
            }
            if ($d != null) {
                $fiches  = $fiches->whereDay('created_at', $d);
            }
        }



        return $fiches;
    }

    public function createdMonth($month)
    {
        return Fiche::whereMonth('created_at', $month)->whereYear('created_at', date('Y'));
    }

    public function ecoutedMonth($month)
    {
        return Fiche::whereMonth('d_ecoute', $month)->whereYear('d_ecoute', date('Y'));
    }

    public function confirmedMonth($month = null, $year = null)
    {
        return Fiche::whereMonth('d_confirm', $month)->whereYear('d_confirm', $year);
    }

    public function confirmedToday()
    {
        return Fiche::whereDate('d_confirm', \Carbon\Carbon::today());
    }
    //where date du rendez-vous est $month
    public function rdvMonth($month = null, $year = null)
    {
        return Fiche::whereMonth('d_rv', $month)->whereYear('d_rv', $year);
    }

    // where date rappel = $month
    public function reportMonth(int $month = null)
    {
        return Fiche::whereMonth('d_rappel', $month)->whereYear('d_rappel', date('Y'));
    }

    // reported $month 
    public function reportedMonth(int $month = null)
    {
        return Fiche::whereMonth('d_repo', $month)->whereYear('d_repo', date('Y'));
    }


    // reported $day 
    // TODO: Use ReportRepository
    public function reportedDay(int $day, int $month, int $year)
    {
        return Fiche::whereDay('d_repo', $day)->whereMonth('d_repo', $month)->whereYear('d_repo', $year);
    }

    // sended
    public function sended($month = null)
    {
        return Fiche::whereMonth('d_env', $month)->whereYear('d_env', date('Y'));
    }


    // Compte Rendu
    public function crs()
    {
        return $this->hasMany(CR::class);
    }
}
