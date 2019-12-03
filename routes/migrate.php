<?php 

    // users
    Route::get('/migrate-users', function(){

        ini_set('max_execution_time', 0);

        foreach(\App\User::on('mysql2')->withTrashed()->get() as $u) {
            $user = new \App\User;

            $user->id = $u->id;
            $user->name = $u->name;
            $user->email = $u->email;

            $user->email_verified_at = $u->email_verified_at;
            $user->password = $u->password;
            $user->remember_token = $u->remember_token;
            $user->created_at = $u->created_at;
            $user->updated_at = $u->updated_at;

            //Admin
            if($u->role_id == 1) { $user->role_id = 1; }
            if($u->role_id == 2) { $user->role_id = 4; }
            // Agent
            if($u->role_id == 3) { $user->role_id = 2; }
            //Confirmation
            if($u->role_id == 4) { $user->role_id =  5 ;}
            //Ecoute
            if( $u->role_id == 6 ) { $user->role_id = 3;}
            //Plateau
            if($u->role_id == 7) { $user->role_id = 6 ; }
            // Report
            if($u->role_id == 8 ) { $user->role_id = 7;}

            // $user->role_id = $u->role_id;
            
            
            $user->fictif = $u->fictif_name;
            $user->deleted_at = $u->deleted_at;

            $user->save();

        }

        return 'DONE';

    });

    // partenaires
    Route::get('/migrate-partenaires', function(){
        ini_set('max_execution_time', 0);
        foreach (\App\Partenaire::on('mysql2')->withTrashed()->get() as $par) {
            $p = new \App\Partenaire;
            $p->id = $par->id;
            $p->name = $par->name;
            $p->desc = null;
            $p->adre = $par->adresse;
            $p->ville = null;
            $p->cp = null;
            $p->isActive = 1;
            $p->created_at = $par->created_at;
            $p->updated_at = $par->updated_at;
            $p->deleted_at = $par->deleted_at;
            $p->prix_fiche = 0;
            $p->save();
        }


        return 'DONE';
    });

    //Partenaire emails
    Route::get('/migrate-partenaire-emails', function(){
        ini_set('max_execution_time', 0);
        foreach (\App\EmailPart::on('mysql2')->withTrashed()->get() as $par) {

            $p = new \App\EmailPartenaire;

            $p->id = $par->id;
            $p->email = $par->email;
            $p->partenaire_id = $par->partenaire_id;
            $p->updated_at = $par->updated_at;
            $p->deleted_at = $par->deleted_at;

            $p->save();
        };

        return 'DONE';
    });

    // fiches
    Route::get('/migrate-fiches', function(){

        ini_set('max_execution_time', 0);


        foreach(\App\Fiche::on('mysql2')->get() as $f) {
            $fiche = \App\Fiche::find($f->id);
            $fiche->locataire = $f->locataire;
            $fiche->save();
        }

        // for ($i=37; $i < 5200 ; $i++) {
            
        //     if( \App\Fiche::on('mysql2')->withTrashed()->find($i) ) {

        //         $f = \App\Fiche::on('mysql2')->withTrashed()->find($i);

        //         $fiche = \App\Fiche::find($i);

        //         // dd($fiche);
        //         // $fiche->locataire = $f->ki;
        //         // $fiche = new \App\Fiche();
        //         // $fiche->id = $f->id;
        //         // $fiche->user_id = $f->user_id;

        //         // $fiche->conf_id = $f->confirmer_id;
        //         // $fiche->ecoute_id = $f->ecouter_id;
        //         // $fiche->repo_id = $f->repporter_id;
        //         // $fiche->env_id = null;
        //         // $fiche->rtv_id = $f->retv_id;

        //         // $fiche->partenaire_id = $f->partenaire_id;

        //         // /**
        //         //  * Status
        //         //  */
        //         // // A Ecouter
        //         // if($f->status == null) { $fiche->status_id = 2;}
        //         // if($f->status == 'A Ecouter') { $fiche->status_id = 1;}
        //         // if($f->status == 'A Retravailler') { $fiche->status_id = 2;}
        //         // if($f->status == 'A Reporter') { $fiche->status_id = 3;}
        //         // if($f->status == 'A Confirmer') { $fiche->status_id = 4;}
        //         // if($f->status == 'Confirmée') { $fiche->status_id = 5;}
        //         // if($f->status == 'A Envoyer') { $fiche->status_id = 6;}
        //         // if($f->status == 'Attente CR') { $fiche->status_id = 7;}
        //         // if($f->status == 'Contrôle Qualitée') { $fiche->status_id = 8;}
        //         // if($f->status == 'Litige') { $fiche->status_id = 9;}
        //         // if($f->status == 'Ciblée') { $fiche->status_id = 10;}
        //         // if($f->status == 'Pas Intéressé') { $fiche->status_id = 11;}
        //         // if($f->status == 'Hors Prod') { $fiche->status_id = 12;}
        //         // if($f->status == 'Hors Cible Age') { $fiche->status_id = 13;}
        //         // if($f->status == 'Hors Cible Endettement') { $fiche->status_id = 14;}
        //         // if($f->status == 'Hors Cible Impot') { $fiche->status_id = 15;}
        //         // if($f->status == 'Hors Cible Profil') { $fiche->status_id = 16;}
        //         // if($f->status == 'Hors secteur') { $fiche->status_id = 17;}
        //         // if($f->status == 'Mandattement') { $fiche->status_id = 18;}
        //         // if($f->status == 'Rendez-vous Téléphonique') { $fiche->status_id = 19;}
        //         // if($f->status == 'Annulé déjà ciblé') { $fiche->status_id = 20;}
        //         // if($f->status == 'Faux RDV') { $fiche->status_id = 21;}
        //         // if($f->status == 'Faux Num.') { $fiche->status_id = 22;}
        //         // if($f->status == 'Annulé par SMS') { $fiche->status_id = 23;}
        //         // if($f->status == 'Black List') { $fiche->status_id = 24;}
        //         // if($f->status == 'Reporter A Chaud') { $fiche->status_id = 25;}
        //         // if($f->status == 'NRP') { $fiche->status_id = 28;}
        //         // if($f->status == 'Rappel') { $fiche->status_id = 29;}
        //         // if($f->status == 'RDV OK') { $fiche->status_id = 30;}
        //         // if($f->status == '-----------------') { $fiche->status_id = 30;}


        //         // /**
        //         //  * Genre
        //         //  */
        //         // if($f->genre == 'Mr') {$fiche->genre = 1;}
        //         // if($f->genre == 'Mme') {$fiche->genre = 2;}
        //         // if($f->genre == 'Mlle') {$fiche->genre = 3;}


        //         // // continuer;
        //         // $fiche->name = $f->name;
        //         // $fiche->prenom = $f->prenom;
        //         // $fiche->s_age = $f->signe_age;
        //         // $fiche->age = $f->age;
        //         // $fiche->profession = $f->profession;
        //         // $fiche->societe = $f->societe;
        //         // $fiche->adresse = $f->adresse_1;
        //         // $fiche->cp = $f->code_postal;
        //         // $fiche->ville = $f->ville;
        //         // $fiche->tel_fix = $f->tel_fix;
        //         // $fiche->tel_mobile = $f->tel_mobile;
        //         // $fiche->tel_bureau = $f->tel_bureau;
        //         // $fiche->email = $f->email;
        //         // $fiche->sf = $f->situation_familiale;
        //         // $fiche->nbr_enfants = $f->nbr_enfants;
        //         // $fiche->s_rev = $f->signe_rev;
        //         // $fiche->rev_annee = $f->rev_foyer_annee;
        //         // $fiche->rev_mois = $f->rev_foyer_mois;
        //         // $fiche->rev_loc = $f->rev_locatif;
        //         // $fiche->loy_eche = $f->rev_locatif;

        //         $fiche->locataire = $f->locataire;
        //         // $fiche->proprietaire = $f->proprietaire;
        //         // $fiche->gratuit = $f->gratuit;


        //         // if($f->proprietaire = 1 ) { $fiche->loy_eche = $f->echeance ;}
        //         // if($f->locataire = 1 ) { $fiche->loy_eche = $f->loyer ;}
        //         // if($f->gratuit = 1 ) { $fiche->loy_eche = $f->echeance ;}

        //         // if($f->signe_import == "sup") { $fiche->s_imp = ">"; }
        //         // if($f->signe_import == "inf") { $fiche->s_imp = "<"; }
        //         // if($f->signe_import == "=") { $fiche->s_imp = "="; }
        //         // // $fiche->s_imp = $f->signe_impot;

        //         // $fiche->imp_annee = $f->impot_annee;
        //         // $fiche->imp_mois = $f->impot_mois;

        //         // $fiche->cre_res = $f->cre_res;
        //         // $fiche->cre_auto = $f->cre_auto;
        //         // $fiche->cre_autre = $f->cre_autre;
        //         // $fiche->cre_total = $f->cre_total;
        //         // $fiche->taux = $f->endettement;

        //         // $fiche->sms_conf = $f->conf_sms;
        //         // $fiche->sms_prise = $f->conf_mail;
        //         // $fiche->cgp = $f->cgp;
        //         // $fiche->d_rv = $f->date_rendez_vous;
        //         // $fiche->h_rv = $f->heure_rendez_vous;

        //         // if($f->lieux_rendez_vous == "Domicile") { $fiche->l_rv = 1;}
        //         // if($f->lieux_rendez_vous == "Bureau") { $fiche->l_rv = 2;}
        //         // if($f->lieux_rendez_vous == "Cabinet") { $fiche->l_rv = 3;}


        //         // $fiche->d_confirm = $f->date_confirm;
        //         // $fiche->d_ecoute = $f->date_ecoute;
        //         // $fiche->d_cible = $f->date_cible;
        //         // $fiche->d_env = null;
        //         // $fiche->d_rappel = $f->date_rappel;
        //         // $fiche->d_repo = $f->date_repport;
        //         // $fiche->d_rtv = $f->date_retv;
        //         // $fiche->h_rappel = $f->heure_rappel;
        //         // $fiche->commentaire = $f->commentaire;
                
        //         // $fiche->created_at = $f->created_at;
        //         // $fiche->updated_at = $f->updated_at;
        //         // $fiche->deleted_at = $f->deleted_at;


        //         // $fiche->is_archived = $f->is_archived == null ? 0 : $f->is_archived;
        //         // $fiche->net = $f->net;
        //         // $fiche->arrondissement = $f->arrondissement;
        //         // $fiche->nrp = $f->nrp == null ? 0 : $f->nrp;

        //         // $fiche->open = null;

        //         // if($f->valid_after_ecoute != null) {$fiche->valid_after_ecoute = 1;}
        //         // if($f->no_valid_after_ecoute != null) {$fiche->no_valid_after_ecoute = 1;}

        //         // $fiche->facture_id = null;
                

        //         $fiche->save();

        //     }
        // }


        return 'DONE';
    });


    // Actions
    Route::get('/migrate-actions', function(){
        ini_set('max_execution_time', 0);
        foreach (\App\Action::on('mysql2')->get() as $action)
        {
            $ac = new \App\Action;
            $ac->id = $action->id;
            $ac->fiche_id = $action->fiche_id;
            $ac->user_id = $action->user_id;
            $ac->action = $action->action;

            //old status
            if($action->value1 == null) { $ac->old_status = 2;}
            if($action->value1 == 'A Ecouter') { $ac->old_status = 1;}
            if($action->value1 == 'A Retravailler') { $ac->old_status = 2;}
            if($action->value1 == 'A Reporter') { $ac->old_status = 3;}
            if($action->value1 == 'A Confirmer') { $ac->old_status = 4;}
            if($action->value1 == 'Confirmée') { $ac->old_status = 5;}
            if($action->value1 == 'A Envoyer') { $ac->old_status = 6;}
            if($action->value1 == 'Attente CR') { $ac->old_status = 7;}
            if($action->value1 == 'Contrôle Qualitée') { $ac->old_status = 8;}
            if($action->value1 == 'Litige') { $ac->old_status = 9;}
            if($action->value1 == 'Ciblée') { $ac->old_status = 10;}
            if($action->value1 == 'Pas Intéressé') { $ac->old_status = 11;}
            if($action->value1 == 'Hors Prod') { $ac->old_status = 12;}
            if($action->value1 == 'Hors Cible Age') { $ac->old_status = 13;}
            if($action->value1 == 'Hors Cible Endettement') { $ac->old_status = 14;}
            if($action->value1 == 'Hors Cible Impot') { $ac->old_status = 15;}
            if($action->value1 == 'Hors Cible Profil') { $ac->old_status = 16;}
            if($action->value1 == 'Hors secteur') { $ac->old_status = 17;}
            if($action->value1 == 'Mandattement') { $ac->old_status = 18;}
            if($action->value1 == 'Rendez-vous Téléphonique') { $ac->old_status = 19;}
            if($action->value1 == 'Annulé déjà ciblé') { $ac->old_status = 20;}
            if($action->value1 == 'Faux RDV') { $ac->old_status = 21;}
            if($action->value1 == 'Faux Num.') { $ac->old_status = 22;}
            if($action->value1 == 'Annulé par SMS') { $ac->old_status = 23;}
            if($action->value1 == 'Black List') { $ac->old_status = 24;}
            if($action->value1 == 'Reporter A Chaud') { $ac->old_status = 25;}
            if($action->value1 == 'NRP') { $ac->old_status = 28;}
            if($action->value1 == 'Rappel') { $ac->old_status = 29;}
            if($action->value1 == 'RDV OK') { $ac->old_status = 30;}

           
             //new status
             if($action->value2 == null) { $ac->new_status = 2;}
             if($action->value2 == 'A Ecouter') { $ac->new_status = 1;}
             if($action->value2 == 'A Retravailler') { $ac->new_status = 2;}
             if($action->value2 == 'A Reporter') { $ac->new_status = 3;}
             if($action->value2 == 'A Confirmer') { $ac->new_status = 4;}
             if($action->value2 == 'Confirmée') { $ac->new_status = 5;}
             if($action->value2 == 'A Envoyer') { $ac->new_status = 6;}
             if($action->value2 == 'Attente CR') { $ac->new_status = 7;}
             if($action->value2 == 'Contrôle Qualitée') { $ac->new_status = 8;}
             if($action->value2 == 'Litige') { $ac->new_status = 9;}
             if($action->value2 == 'Ciblée') { $ac->new_status = 10;}
             if($action->value2 == 'Pas Intéressé') { $ac->new_status = 11;}
             if($action->value2 == 'Hors Prod') { $ac->new_status = 12;}
             if($action->value2 == 'Hors Cible Age') { $ac->new_status = 13;}
             if($action->value2 == 'Hors Cible Endettement') { $ac->new_status = 14;}
             if($action->value2 == 'Hors Cible Impot') { $ac->new_status = 15;}
             if($action->value2 == 'Hors Cible Profil') { $ac->new_status = 16;}
             if($action->value2 == 'Hors secteur') { $ac->new_status = 17;}
             if($action->value2 == 'Mandattement') { $ac->new_status = 18;}
             if($action->value2 == 'Rendez-vous Téléphonique') { $ac->new_status = 19;}
             if($action->value2 == 'Annulé déjà ciblé') { $ac->new_status = 20;}
             if($action->value2 == 'Faux RDV') { $ac->new_status = 21;}
             if($action->value2 == 'Faux Num.') { $ac->new_status = 22;}
             if($action->value2 == 'Annulé par SMS') { $ac->new_status = 23;}
             if($action->value2 == 'Black List') { $ac->new_status = 24;}
             if($action->value2 == 'Reporter A Chaud') { $ac->new_status = 25;}
             if($action->value2 == 'NRP') { $ac->new_status = 28;}
             if($action->value2 == 'Rappel') { $ac->new_status = 29;}
             if($action->value2 == 'RDV OK') { $ac->new_status = 30;}

            $ac->created_at = $action->created_at;
            $ac->updated_at = $action->updated_at;

            $ac->save();
        }

        return 'DONE';
    });



    // Cleaning after the migrate
    Route::get('/clean-null-status', function(){
        ini_set('max_execution_time', 0);
        $fiches = \App\Fiche::where('status_id', null)->get();
        foreach($fiches as $f)
        {
            $f->status_id = 30;
            $f->save();
        }

        return 'DONE';
    });


    Route::get('/clean-validee-actions', function(){
        $action = \App\Action::where('new_status', null)->get();
        foreach($action as $a){
            $a->new_status = 5;
            $a->save();
        }

        $action = \App\Action::where('old_status', null)->get();
        foreach($action as $a){
            $a->old_status = 5;
            $a->save();
        }

        return 'DONE';
    });

    Route::get('/clean/genre', function(){
        $fiches = App\Fiche::where('genre', null)->get();
        return $fiches;
    });
?>