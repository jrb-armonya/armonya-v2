<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFichesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fiches', function(Blueprint $table)
		{
			$table->foreign('conf_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ecoute_id', 'fiches_ecout_id_foreign')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('env_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('facture_id')->references('id')->on('factures')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('partenaire_id')->references('id')->on('partenaires')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('repo_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('rtv_id', 'fiches_rtv_id_foreigh')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('status_id')->references('id')->on('status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fiches', function(Blueprint $table)
		{
			$table->dropForeign('fiches_conf_id_foreign');
			$table->dropForeign('fiches_ecout_id_foreign');
			$table->dropForeign('fiches_env_id_foreign');
			$table->dropForeign('fiches_facture_id_foreign');
			$table->dropForeign('fiches_partenaire_id_foreign');
			$table->dropForeign('fiches_repo_id_foreign');
			$table->dropForeign('fiches_rtv_id_foreigh');
			$table->dropForeign('fiches_status_id_foreign');
			$table->dropForeign('fiches_user_id_foreign');
		});
	}

}
