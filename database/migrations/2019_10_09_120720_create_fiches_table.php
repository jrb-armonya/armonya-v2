<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFichesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fiches', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('fiches_user_id_foreign');
			$table->integer('conf_id')->unsigned()->nullable()->index('fiches_conf_id_foreign');
			$table->integer('ecoute_id')->unsigned()->nullable()->index('fiches_ecout_id_foreign');
			$table->integer('repo_id')->unsigned()->nullable()->index('fiches_repo_id_foreign');
			$table->integer('env_id')->unsigned()->nullable()->index('fiches_env_id_foreign');
			$table->integer('rtv_id')->unsigned()->nullable()->index('fiches_rtv_id_foreigh');
			$table->integer('partenaire_id')->unsigned()->nullable()->index('fiches_partenaire_id_foreign');
			$table->integer('status_id')->unsigned()->nullable()->index('fiches_status_id_foreign');
			$table->string('genre', 7)->nullable();
			$table->string('name')->nullable();
			$table->string('prenom')->nullable();
			$table->string('s_age', 4)->nullable();
			$table->integer('age')->nullable();
			$table->string('profession', 119)->nullable();
			$table->string('societe')->nullable();
			$table->string('adresse')->nullable();
			$table->string('cp')->nullable();
			$table->string('ville')->nullable();
			$table->string('tel_fix')->nullable();
			$table->string('tel_mobile')->nullable();
			$table->string('tel_bureau')->nullable();
			$table->string('email', 119)->nullable();
			$table->string('sf')->nullable();
			$table->integer('nbr_enfants')->nullable();
			$table->string('s_rev', 4)->nullable();
			$table->float('rev_annee', 11)->nullable();
			$table->float('rev_mois')->nullable();
			$table->float('rev_loc')->nullable();
			$table->float('loy_eche')->nullable();
			$table->integer('locataire')->nullable();
			$table->integer('proprietaire')->nullable();
			$table->integer('gratuit')->nullable();
			$table->string('s_imp', 1)->nullable();
			$table->float('imp_annee')->nullable();
			$table->float('imp_mois')->nullable();
			$table->integer('cre_res')->nullable();
			$table->integer('cre_auto')->nullable();
			$table->integer('cre_conso')->nullable();
			$table->integer('cre_autre')->nullable();
			$table->integer('cre_total')->nullable();
			$table->integer('taux')->nullable();
			$table->integer('sms_conf')->nullable();
			$table->integer('sms_prise')->nullable();
			$table->integer('cgp')->nullable();
			$table->date('d_rv')->nullable();
			$table->string('h_rv', 5)->nullable();
			$table->integer('l_rv')->nullable();
			$table->dateTime('d_confirm')->nullable();
			$table->dateTime('d_ecoute')->nullable();
			$table->dateTime('d_cible')->nullable();
			$table->dateTime('d_env')->nullable();
			$table->dateTime('d_rappel')->nullable();
			$table->dateTime('d_repo')->nullable();
			$table->dateTime('d_rtv')->nullable();
			$table->string('h_rappel')->nullable();
			$table->text('commentaire', 65535)->nullable();
			$table->integer('do_mobile')->nullable();
			$table->integer('do_fix')->nullable();
			$table->integer('do_name')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('is_archived')->default(0);
			$table->smallInteger('net')->nullable();
			$table->string('arrondissement')->nullable();
			$table->integer('nrp')->default(0);
			$table->boolean('open')->nullable();
			$table->integer('no_valid_after_ecoute')->nullable();
			$table->integer('valid_after_ecoute')->nullable();
			$table->integer('facture_id')->unsigned()->nullable()->index('fiches_facture_id_foreign');
			$table->text('internal_comment', 65535)->nullable();
			$table->boolean('retour')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fiches');
	}

}
