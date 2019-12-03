<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    protected $dates = ['deleted_at','update_at', 'created_at', 'd_rv', 'd_rappel', 'date_retv', 'd_env'];

    public $fillable = [
        'user_id', 'status_id', 'genre', 'name', 'prenom', 's_age', 'age', 'profession', 'societe', 'adresse',
        'cp', 'ville', 'tel_fix', 'tel_mobile', 'tel_bureau', 'email', 'sf', 'nbr_enfants', 's_rev', 'rev_annee',
        'rev_mois', 'rev_loc', 'loy_eche', 'locataire', 'proprietaire', 'gratuit', 's_imp', 'imp_annee',
        'imp_mois', 'cre_res', 'cre_auto', 'cre_autre', 'cre_conso', 'cre_total', 'taux',
        'sms_conf', 'sms_prise', 'cgp', 'd_rv', 'h_rv', 'l_rv', 'd_confirm', 'd_ecoute', 'd_cible', 'd_env', 'd_rappel', 'd_repo','h_rappel',
        'ecoute_id', 'commentaire', 'is_archived', 'net', 'nrp','conf_id', 'repo_id','partenaire_id', 'env_id', 'valid_after_ecoute', 'arrondissement',
        'no_valid_after_ecoute', 'internal_comment', 'action_id', 'fiche_id'
    ];

    public function action()
    {
        return $this->belongsTo(App\Action::class);
    }
    public function fiche()
    {
        return $this->belongsTo(App\Fiche::class);
    }
    public function user() {
        return $this->belongsTo('App\User')->withTrashed();
    }
    public function partenaire() {
        return $this->belongsTo('App\Partenaire');
    }
   
}
