<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->increments('id');
            
            /**
             * user_id: created_by
             * conf_id: confirmed_by
             * repo_id: reported_by
             * env_id:  send_by
             * 
             * partenaire_id
             * status_id
             */
            $table->integer('user_id')->unsigned();
            $table->integer('conf_id')->unsigned()->nullable();
            $table->integer('ecoute_id')->unsigned()->nullable();
            $table->integer('repo_id')->unsigned()->nullable();
            $table->integer('env_id')->unsigned()->nullable();
            $table->integer('rtv_id')->unsigned()->nullable();
            $table->integer('partenaire_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned();

            $table->string('genre', 7)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('prenom', 255)->nullable();
            
            //Signe_age
            $table->string('s_age', 4)->nullable();
            $table->integer('age')->nullable();
            $table->string('profession', 119)->nullable();
            $table->string('societe', 255)->nullable();

            //  We can put this 3 information in another table.
            //  Adresses
            $table->string('adresse', 255)->nullable();
            $table->string('cp', 255)->nullable();
            $table->string('ville', 255)->nullable();

            //  We can put this phone numbers in a differente table
            //  Phones
            $table->string('tel_fix', 255)->nullable();
            $table->string('tel_mobile', 255)->nullable();
            $table->string('tel_bureau', 255)->nullable();
            $table->string('email', 119)->nullable();

            $table->string('sf', 255)->nullable();
            $table->integer('nbr_enfants')->nullable();
            
            //signe_revenu, revenu_annee, revenu_mois
            $table->string('s_rev', 4)->nullable();
            $table->float('rev_annee', 8, 2)->nullable();
            $table->float('rev_mois', 8, 2)->nullable();

            //revenu_locatif
            $table->float('rev_loc', 8, 2)->nullable();

            // Soit loyer, soit echeance
            // if locataire != null loy_ech = loyer;
            // else if proprietaire != null the loy_ech = echeance
            $table->float('loy_eche', 8, 2)->nullable();

            $table->integer('locataire')->nullable();
            $table->integer('proprietaire')->nullable();
            $table->integer('gratuit')->nullable();

            $table->string('s_imp',1)->nullable();
            $table->float('imp_annee', 8, 2)->nullable();
            $table->float('imp_mois', 8, 2)->nullable();

            //credits
            $table->integer('cre_res')->nullable();
            $table->integer('cre_auto')->nullable();
            $table->integer('cre_conso')->nullable();
            $table->integer('cre_autre')->nullable();
            $table->integer('cre_total')->nullable();
            $table->integer('taux')->nullable();
            

            //CONFIRMATION
            $table->integer('sms_conf')->nullable();
            $table->integer('sms_prise')->nullable();
            $table->integer('cgp')->nullable();

            //date_rendez_vous, heure_rendez_vous, lieu_rendez_vous
            $table->date('d_rv')->nullable();
            $table->string('h_rv',5)->nullable();
            $table->string('l_rv', 9)->nullable();

            //date_confirm, date_ecoute, date_cible, d_env
            $table->timestamp('d_confirm')->nullable();
            $table->timestamp('d_ecoute')->nullable();
            $table->timestamp('d_cible')->nullable();
            $table->timestamp('d_env')->nullable();
            $table->timestamp('d_repo')->nullable();
            $table->timestamp('d_rtv')->nullable();

            $table->timestamp('d_rappel')->nullable();
            $table->string('h_rappel')->nullable();
            
            $table->text('commentaire')->nullable();

            $table->integer('do_mobile')->nullable();
            $table->integer('do_fix')->nullable();
            $table->integer('do_name')->nullable();
            

            //Foreign keys (7 - 5: users - 1: part - 1: status)
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('conf_id')->references('id')->on('users');
            $table->foreign('ecoute_id')->references('id')->on('users');
            $table->foreign('repo_id')->references('id')->on('users');
            $table->foreign('env_id')->references('id')->on('users');
            $table->foreign('partenaire_id')->references('id')->on('partenaires');
            $table->foreign('status_id')->references('id')->on('status');
            
            $table->timestamps();
            $table->softDeletes();
            $table->integer('is_archived')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiches');
    }
}
